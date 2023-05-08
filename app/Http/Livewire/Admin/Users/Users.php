<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

use App\Models\Estado;
use Spatie\Permission\Models\Role;

class Users extends Component{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $user_id,$nombres, $url, $email, $telefono, $estado, $estado_id, $role, $role_actual;

    public $paginas = 5, $search = '';
    public $column = 'id', $order = 'asc';
    public $viewUsers = false, $list;
    public $editUsers = false;
    public $states, $roles;

    public $readyToLoad = false, $stateLoadTable = '';

    public $rules = [
        'estado_id' => 'required',
        'role' => 'required'
    ];


    public function updatingSearch(){
        $this->resetPage();
    }

    protected $queryString = [
        'paginas'
    ];

    public function lodadData(){
        $this->readyToLoad = true;
    }

    public function mount(){
        $this->states = Estado::all()->except(3);
        $this->roles = Role::all();
    }

    public function render(){ 
    
        if($this->readyToLoad){

            $buscar = $this->search;

            $users = User::whereNotIn('id',[Auth::id()])
                    ->Where(function ($query) use ($buscar) {
                        $query->orWhere('nombres', 'like', '%' . $buscar . '%')
                            ->orWhere('primer_apellido', 'like', '%' . $buscar . '%')
                            ->orWhere('segundo_apellido', 'like', '%' . $buscar . '%')
                            ->orWhere('documento', 'like', '%' . $buscar . '%')
                            ->orWhere('email', 'like', '%' . $buscar . '%');
                    })
                    ->orderBy($this->column,$this->order)
                    ->paginate($this->paginas);

            $this->stateLoadTable = '';
            return view('livewire.admin.users.users',[
                'users' =>  $users
            ]);

        }else{

            $users = [];
            $this->stateLoadTable = 'cargando';
            return view('livewire.admin.users.users',[
                'users' =>  $users
            ]);

        }

    }

    public function new_user(){
        return redirect()->to('/admin/create_users');
    }

    public function ordenar($column){

        if($this->column == $column){

            if($this->order == 'asc'){
                $this->order = 'desc';
    
            }else{
                $this->order = 'asc';
            }

        }else{
            $this->column = $column;
            $this->order = 'asc';
        }

    }


    public function viewUserInfo($id,$modal){

        $User = new User();
        $list = $User::with(['estado','phones','roles'])->find($id);
        $this->user_id = $list->id;

        $this->url = $list->url;
        $this->nombres = $list->nombres . " " . $list->primer_apellido . " " . $list->segundo_apellido;
        $this->email = $list->email;

        $this->estado_id = $list->estado_id;
        $this->estado = $list->estado->nombre;

        foreach($list->phones as $item){
            $this->telefono = $item->numero;
        }
        
        foreach($list->roles as $item){
            $this->role = $item->name;
        }

        if($modal=='ver'){
            $this->viewUsers = true;
        }else{
            $this->editUsers = true;
        }

    }

    public function editUsers(){
        
        $this->validate();

        $id = $this->user_id;

        $user = new User();
        $list = $user::with('roles')->find($id);
        $list->estado_id = $this->estado_id;

        $state = $list->save();

        if($state){

            foreach($list->roles as $item){
                $this->role_actual = $item->name;
            }
            
            $list->removeRole($this->role_actual);
            $status = $list->assignRole($this->role);

            if($status){

                $this->editUsers = false;
                $this->reset('role_actual','role','estado_id');

                session()->flash('message', 'Usuario actualizado');
            }else{
                session()->flash('message', 'Usuario no actualizado');
            }

        }else{
            session()->flash('message', 'Usuario no actualizado');
        }
        

    }



}
