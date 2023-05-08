<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
 
use App\Http\Controllers\LogoutController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',function(){

    if (Auth::check()) {


        foreach(auth()->user()->roles as $item){
            $rol_user =  $item->name;
        }

        if($rol_user == 'Administrador'){
            return redirect('admin/dashboard');
        }else{

        }


    }else{
        return view('interface.login');
    }

})->name('login');

Route::get('/registro',function(){
    return view('interface.registro');
})->name('registro');

Route::get('/activated',function(){
    return view('interface.count-activada');
})->middleware('auth')->name('activated');


Route::get('/logout',[LogoutController::class,'logout'])->middleware('auth')->name('logout');


//Redirección para mostrar que se registro exitosamente
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


 //Redirección a una ruta especifica para activar la cuenta
 Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
     $request->fulfill();
  
     return view('interface.activated-count');
 })->middleware(['auth', 'signed'])->name('verification.verify');

//Reenvio del correo para verificar correo
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


//Funciones del administrador
Route::middleware('auth')->prefix('admin')->group(function(){

    Route::get('/dashboard',function(){
        return view('interface.dashboard');
    })->name('dashboard');

    Route::get('/users',function(){
        return view('interface.users.users');
    })->name('users');

    Route::get('/create_users',function(){
        return view('interface.users.create_users');
    })->name('create_users');

    Route::get('/productos',function(){
        return view('interface.products.productos');
    })->name('productos');

    Route::get('/create_productos',function(){
        return view('interface.products.create_productos');
    })->name('create_products');


});

Route::get('/name-user',function(){
    return auth()->user()->nombres . " " . auth()->user()->primer_apellido . " " . auth()->user()->segundo_apellido;
});


//Funciones del cliente
Route::middleware('auth')->prefix('client')->group(function(){

});



Route::get('/st',function(){
    return view('mails.solicitar_stock');
});

