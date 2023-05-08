<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;

use App\Models\Categorie;
use App\Models\Subcategorie;
use App\Models\Entrance;
use App\Models\Stock;

use Livewire\WithPagination;

use Illuminate\Support\Facades\Mail;
use App\Mail\ProveedorMailable;
use App\Models\Discount;
use App\Models\State;
use App\Models\Taxe;
use App\Models\Provider;

use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

use App\Models\Photo;


class Productos extends Component{

    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    public $buscar = true, $filtrar = false, $count = 5, $openModalInfo = false, $openModalHistory = false, $openModalHistorySales = false, $openModalRegisteredStock = false, $openModalEditProduct = false;
    public $categorie_id = '', $subcategorie_id = '';

    public $readyToLoad = false, $state = '';
    public $categories, $subcategories, $buscar_producto = '';
    public $listProduct, $listEntradas, $listSalidas;
    public $stock_new, $stock_id, $product_id, $nombre_producto_stock;

    public $productDate, $nombre, $descripcion, $especificaciones, $state_id, $precio, $categorie_id_edit, $subcategorie_id_edit, $descuento_id, $taxe_id, $proveedor_id, $photos = [], $photos_new = [];
    public $states, $categories_edit, $subcategories_edit, $discounts, $taxes, $proveedores, $addPhotos = false;

    protected $rules = [
        'stock_new' => 'required'
    ];

    protected $queryString = [
        'count'
    ];

    public function loadData(){
        $this->readyToLoad = true;
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render(){

        if ($this->categorie_id_edit == 'Seleccione') {
            $this->subcategorie_id_edit = '';
        }

        if($this->filtrar == false){
            $this->categorie_id = '';
            $this->subcategorie_id = '';
        }else if($this->buscar_producto == false){
            $this->buscar_producto = '';
        }

        $this->categories = Categorie::all();
        $this->subcategories = Subcategorie::where('categorie_id',$this->categorie_id)->get();

        if($this->buscar == true){
            $this->filtrar = false;
        }else if($this->filtrar == true){
            $this->buscar = false;
        }

        $this->states = State::all();
        $this->categories_edit = Categorie::all();
        $this->subcategories_edit = Subcategorie::where('categorie_id',$this->subcategorie_id_edit)->get();

        $this->discounts = Discount::all();
        $this->taxes = Taxe::all();
        $this->proveedores = Provider::all();

        if($this->readyToLoad){

            if($this->buscar_producto != ''){

                $products = Product::with(['subcategorie','state','stock',])->where('nombre','like','%' . $this->buscar_producto . '%')
                                    ->paginate($this->count);

            }else if($this->subcategorie_id != ''){

                $products = Product::with(['subcategorie','state','stock',])->where('subcategorie_id',$this->subcategorie_id)->paginate($this->count);

            }else{
                
                $products = Product::with(['subcategorie','state','stock',])->paginate($this->count);

            }              


            $this->state = '';
            return view('livewire.admin.products.productos',[
                'products' => $products
            ]);

        }else{

            $products= [];
            $this->state = 'cargando';
            return view('livewire.admin.products.productos',[
                'products' => $products
            ]);

        }



    }

    public function new_product(){
        return redirect()->to('/admin/create_productos');
    }

    public function ordenar($columna){

    }

    public function active_buscar(){
        $this->buscar = true;
        $this->filtrar = false;
    }

    public function active_filtrar(){
        $this->filtrar = true;
        $this->buscar = false;
    }

    public function searchProduct($id){

        $this->listProduct = Product::with(['stock','photos','subcategorie','discount','state'])->find($id);

        $this->openModalInfo = true;

    }

    public function searchEntrances($id){

        $this->listEntradas = Product::with('stock')->where('id','=',$id)->get();
        $this->openModalHistory = true;

    }

    public function searchSalidas($id){

        $this->listSalidas = Product::with('stock')->where('id','=',$id)->get();
        $this->openModalHistorySales = true;

    }

    public function searchProductStock($id){

        $listProduct = Product::with('stock')->find($id);
        $this->product_id = $listProduct->id;
        $this->nombre_producto_stock = $listProduct->nombre;

        foreach($listProduct->stock as $item){
            $this->stock_id = $item->id;
        }

        $this->openModalRegisteredStock = true;
    }

    public function closeModelUpdateStock(){
        $this->reset('stock_new');
        $this->openModalRegisteredStock = false;
    }


    public function  create_new_product(){

        $this->validate();

        $listProduct = Stock::find($this->stock_id);
        $cantidad_old = $listProduct->existencias;
        $cantidad_new = $cantidad_old + $this->stock_new;

        $listProduct->existencias = $cantidad_new;
        $state = $listProduct->save();

        if($state){

            $status = Entrance::create([
                'stock_id' => $this->stock_id,
                'cantidad' => $this->stock_new
            ]);

            if($status){
                session()->flash('message', 'stock actualizado');

                $this->reset('stock_new');
                $this->openModalRegisteredStock = false;

            }else{
                session()->flash('message', 'stock no actualizado');
            }

        }else{
            session()->flash('message', 'stock no actualizado');
        }

    }


    public function sendEmailStock($id){

        $listProduct = Stock::with('provider')->find($id);

        $email = $listProduct->provider->email;
        

        $correo = new ProveedorMailable();
        $state = mail::to($email)->send($correo);

        if($state){
            session()->flash('message', 'Stock solicitado');
        }else{
            session()->flash('message', 'Stock no solicitado');
        }

    }



    public function searchProductForEdit($id){

        $productDate = Product::with(['stock','photos','subcategorie','discount','state'])->find($id);

        $this->product_id = $productDate->id;
        $this->nombre = $productDate->nombre;
        $this->descripcion = $productDate->descripcion;
        $this->especificaciones = $productDate->especificaciones;
        $this->state_id = $productDate->state_id;
        $this->precio = $productDate->precio;


        $this->categorie_id_edit = $productDate->subcategorie->categorie->id;
        

        $this->subcategorie_id_edit = $productDate->subcategorie_id;
        $this->taxe_id = $productDate->taxe_id;

        foreach($productDate->stock as $item){
            $this->proveedor_id = $item->provider_id;
        }


        $this->photos = $productDate->photos;
        

        $this->openModalEditProduct = true;

    }


    public function updateProduct(){

        $this->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'especificaciones' => 'required',
            'subcategorie_id' => 'required',
            'discount_id' => 'required',
            'taxe_id' => 'required',
            'state_id' => 'required',
            'precio' => 'required',
        ]);
        

        $listProduct = Product::with(['stock','photos','subcategorie','discount','state'])->find($this->product_id);
        $id = $listProduct->id;
        $listProduct->nombre = $this->nombre;
        $listProduct->descripcion = $this->descripcion;
        $listProduct->especificaciones = $this->especificaciones;
        $listProduct->subcategorie_id = $this->subcategorie_id;
        $listProduct->discount_id = $this->discount_id;
        $listProduct->taxe_id = $this->taxe_id;
        $listProduct->state_id = $this->state_id;
        $listProduct->precio = $this->precio;
        
        $state = $listProduct->save();

        if($state){

            $listStock = Stock::where('product_id','=',$id)->get();
            $listStock->provider_id = $this->provider_id;
            $listStock->existencias = $this->precio;

            $status = $listStock->save();

            if($status){

                if(count($this->photos_new)){

                    for($i = 0; $i < count($this->photos_new); $i++){

                        $image = $this->photos_new[$i]->store('public/productos');
                        $url = Storage::url($image);
        
                        $status1 = Photo::create([
                            'product_id' => $id,
                            'url' => $url
                        ]);

                    }

                    if($status1){
                        session()->flash('message', 'producto actualizado');
                    }else{
                        session()->flash('message', 'producto no actualizado');
                    }


                }else{
                    session()->flash('message', 'producto actualizado');
                }


            }else{
                session()->flash('message', 'producto no actualizado');
            }


        }else{
            session()->flash('message', 'producto no actualizado');
        }



    }


    public function probar(){
        $out = new \Symfony\Component\Console\Output\ConsoleOutput();
        $out->writeln("Hello from Terminal");
    }

    
}
