<?php

namespace App\Http\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Users extends Component{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $paginas = 5, $search = '';
    public $column = 'id', $order = 'asc';

    public $readyToLoad = false, $stateLoadTable = '';

    public function updatingSearch(){
        $this->resetPage();
    }

    protected $queryString = [
        'paginas'
    ];

    public function lodadData(){
        $this->readyToLoad = true;
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



}
