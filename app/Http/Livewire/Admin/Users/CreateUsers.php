<?php

namespace App\Http\Livewire\Admin\Users;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

use App\Models\Code;
use App\Models\Document;
use App\Models\Gender;
use App\Models\User;
use App\Models\Phone;


use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMailable;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class CreateUsers extends Component
{

    public $nombres, $primer_apellido, $segundo_apellido, $tipo_documento, $documento, $email, $codigo_pais, $telefono, $fecha_nacimiento, $genero, $role;
    public $password;

    public $codes, $documents, $genders, $roles;

    public $rules = [
        'nombres' => 'required',
        'primer_apellido' => 'required',
        'segundo_apellido' => 'required',
        'tipo_documento' => 'required',
        'documento' => 'required',
        'email' => 'required|email|unique:users',
        'codigo_pais' => 'required',
        'telefono' => 'required',
        'fecha_nacimiento' => 'required',
        'genero' => 'required',
        'role' => 'required'
    ];


    public function mount(){
        $this->codes = Code::all();
        $this->documents = Document::all();
        $this->genders = Gender::all();
        $this->roles = Role::all();
    }

    public function render(){
        return view('livewire.admin.users.create-users');
    }

    public function regresar(){
        return redirect()->to('/admin/users');
    }

    public function registro(){

        $this->validate();

        $estado_id = 3;
        $url = '/storage/profile/user-profile.png';

        $state = User::create([
            'document_id' => $this->tipo_documento,
            'documento' => $this->documento,
            'nombres' => $this->nombres,
            'primer_apellido' => $this->primer_apellido,
            'segundo_apellido' => $this->segundo_apellido,
            'email' => $this->email,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'password' => Hash::make($this->documento),
            'gender_id' => $this->genero,
            'estado_id' => $estado_id,
            'url' => $url
        ])->assignRole($this->role);

    
        if($state){
            $user = User::latest('id')->first();

            $phones = Phone::create([
                'user_id' => $user->id,
                'code_id' => $this->codigo_pais,
                'numero' => $this->telefono
            ]);

            if($phones){
                event(new Registered($user));
                session()->flash('message', 'Registro creado');
                $this->reset(
                    'nombres',
                    'primer_apellido',
                    'segundo_apellido',
                    'tipo_documento',
                    'documento',
                    'email',
                    'codigo_pais',
                    'telefono',
                    'fecha_nacimiento',
                    'genero',
                    'role'
                );
            }else{
                session()->flash('message', 'Registro no creado');
            }

        }else{
            session()->flash('message', 'Registro no creado');
        }
        
        
    }



}
