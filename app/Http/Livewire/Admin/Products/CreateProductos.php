<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;

use Illuminate\Support\Facades\Storage;

use Livewire\WithFileUploads;

use App\Models\Categorie;
use App\Models\Discount;
use App\Models\Subcategorie;
use App\Models\Stock;
use App\Models\State;
use App\Models\Provider;
use App\Models\Product;
use App\Models\Photo;
use App\Models\Entrance;

use Carbon\Carbon;

class CreateProductos extends Component
{

    use WithFileUploads;

    public $nombre, $descripcion, $categorie_id = '', $subcategorie_id, $discount_id = '', $state_id, $stock, $provider_id, $photos = [], $precio, $especificaciones;

    public $categories, $subcategories, $discounts, $states, $providers, $discount_state = false;

    public $rules = [
        'nombre' => 'required',
        'descripcion' => 'required',
        'categorie_id' => 'required',
        'subcategorie_id' => 'required',
        'state_id' => 'required',
        'stock' => 'required',
        'provider_id' => 'required',
        'photos' => 'required',
        'precio' => 'required',
        'especificaciones' => 'required'
    ];



    public function render()
    {

        if (!$this->discount_state) {
            $this->discount_id = '';
        }

        $this->categories = Categorie::all();

        $this->subcategories = Subcategorie::where('categorie_id', '=', $this->categorie_id)->get();

        if ($this->categorie_id == 'Seleccione') {
            $this->subcategorie_id = '';
        }

        $this->discounts = Discount::all();
        $this->states = State::all()->except(3);

        $this->providers = Provider::all();

        return view('livewire.admin.products.create-productos');
    }

    public function regresar()
    {
        return redirect()->to('/admin/productos');
    }

    public function resetSubcategories()
    {
        $this->subcategories = '';
        $this->subcategorie_id = '';
    }

    public function registro(){

        $this->validate();

        $cantidad_descripcion = strlen($this->descripcion);
        $this->descripcion = substr($this->descripcion, 3, $cantidad_descripcion - 7);

        $cantidad_especificaciones = strlen($this->especificaciones);
        $this->especificaciones = substr($this->especificaciones, 3, $cantidad_especificaciones - 7);


        if($this->discount_id == ''){

            $state = Product::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'especificaciones' => $this->especificaciones,
                'subcategorie_id' => $this->subcategorie_id,
                'state_id' => $this->state_id,
                'precio' => $this->precio
            ]);

        }else{

            $state = Product::create([
                'nombre' => $this->nombre,
                'descripcion' => $this->descripcion,
                'especificaciones' => $this->especificaciones,
                'subcategorie_id' => $this->subcategorie_id,
                'discount_id' => $this->discount_id,
                'state_id' => $this->state_id,
                'precio' => $this->precio
            ]);

        }

        if ($state) {
            $product = Product::latest('id')->first();

            foreach ($this->photos as $photo) {

                $image = $photo->store('public/productos');
                $url = Storage::url($image);

                $status = Photo::create([
                    'product_id' => $product->id,
                    'url' => $url
                ]);
            }

            if ($status) {

                $sate_stock = Stock::create([
                    'product_id' => $product->id,
                    'provider_id' => $this->provider_id,
                    'existencias' => $this->stock
                ]);

                if ($sate_stock) {

                    $stock = Stock::latest('id')->first();

                    $register_entrace = Entrance::create([
                        'stock_id' => $stock->id,
                        'cantidad' => $this->stock
                    ]);


                    if($register_entrace){

                        $this->reset('nombre', 'descripcion', 'categorie_id', 'subcategorie_id', 'discount_id', 'state_id', 'stock', 'provider_id', 'precio', 'especificaciones');
                        $this->photos = [];

                        session()->flash('message', 'Producto registrado');

                    }else{
                        session()->flash('message', 'Producto no registrado');
                    }

                } else {
                    session()->flash('message', 'Producto no registrado');
                }
            } else {
                session()->flash('message', 'Producto no registrado');
            }
        } else {
            session()->flash('message', 'Producto no registrado');
        }
    }



}
