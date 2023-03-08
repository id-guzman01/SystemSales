<?php

namespace App\Http\Livewire\Auth\Registro;


use Livewire\Component;
use App\Models\Code;
use App\Models\Document;
use App\Models\Gender;
use App\Models\User;
use App\Models\Phone;
use App\Models\Profile;

use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMailable;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class Registro extends Component
{

    public $nombres, $primer_apellido, $segundo_apellido, $tipo_documento, $documento, $email, $codigo_pais, $telefono, $fecha_nacimiento, $genero;
    public $password, $password_confirmation;

    public $codes, $documents, $genders;

    public $capcha, $permission, $openModal=false;

    protected $rules = [
        'nombres' => 'required',
        'primer_apellido' => 'required',
        'segundo_apellido' => 'required',
        'tipo_documento' => 'required',
        'documento' => 'required',
        'email' => 'required|email|unique:users',
        'codigo_pais' => 'required',
        'telefono' => 'required',
        'fecha_nacimiento' => 'required',
        'password' => 'required|min:8|confirmed',
        'password_confirmation' => 'required|min:8',
        'permission' => 'required',
        'genero' => 'required'
    ];


    public function mount(){
        $this->codes = Code::all();
        $this->documents = Document::all();
        $this->genders = Gender::all();
    }

    public function render()
    {
        return view('livewire.auth.registro.registro');
    }


    public function registrar(){

        $this->validate();

        $role_id = 2;
        $estado_id = 3;

        $state = User::create([
            'document_id' => $this->tipo_documento,
            'documento' => $this->documento,
            'nombres' => $this->nombres,
            'primer_apellido' => $this->primer_apellido,
            'segundo_apellido' => $this->segundo_apellido,
            'email' => $this->email,
            'fecha_nacimiento' => $this->fecha_nacimiento,
            'password' => Hash::make($this->password),
            'role_id' => $role_id,
            'gender_id' => $this->genero,
            'estado_id' => $estado_id
        ]);

        if($state){

            $user = User::latest('id')->first();

            $register = Phone::create([
                'user_id' => $user->id,
                'code_id' => $this->codigo_pais,
                'numero' => $this->telefono
            ]);

            if($register){

                $url = '/storage/profile/user-profile.png';

                $image = Profile::create([
                    'user_id' => $user->id,
                    'url' => $url
                ]);


                if($image){

                    /*$nombre = $this->nombres . " " . $this->primer_apellido . " " . $this->segundo_apellido;
                    $correo = new RegisterMailable($nombre,$this->email);
                    $send = mail::to($this->email)->send($correo);*/
        
                    //if($send){

                        $credentials = [
                            'email' => $this->email,
                            'password' => $this->password
                        ];
                
                        Auth::attempt($credentials);

                        event(new Registered($user));
                        $this->reset('nombres', 'primer_apellido', 'segundo_apellido', 'tipo_documento', 'documento', 'email', 'codigo_pais', 'telefono', 'fecha_nacimiento', 'genero', 'password', 'password_confirmation', 'permission');

                        return redirect()->to('/email/verify');
                    /*}else{
                        session()->flash('message', 'Correo no enviado');
                        $this->openModal = true;
                    }*/

                }else{
                    session()->flash('message', 'Registro no creado');
                    $this->openModal = true;
                }

            }else{
                session()->flash('message', 'Registro no creado');
                $this->openModal = true;
            }

        }else{
            session()->flash('message', 'Registro no creado');
            $this->openModal = true;
        }

    }

}
