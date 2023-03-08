<?php

namespace App\Http\Livewire\Auth\Activated;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

use App\Models\User;

class Activated extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8'
    ];

    public function render()
    {
        return view('livewire.auth.activated.activated');
    }

    public function login(){

        $this->validate();

        $user = User::where('email','=',$this->email)->first();
   
        if( isset($user->id) ){

            if(Hash::check($this->password,$user->password)){

                $estado = 1;
                $user->estado_id =  $estado;
                $resultado = $user->save();

                if($resultado){
                    return redirect()->to('/activated');
                }else{
                    session()->flash('message', 'Proceso Fallido');
                }

            }else{
                session()->flash('message', 'contraseña erronea');
            }

        }else{
            
        }

    }

}
