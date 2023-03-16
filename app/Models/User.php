<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'document_id',
        'documento',
        'nombres',
        'primer_apellido',
        'segundo_apellido',
        'email',
        'fecha_nacimiento',
        'password',
        'gender_id',
        'estado_id',
        'url'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    protected function nombres():Attribute{
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value)
        );
    }

    protected function primer_apellido():Attribute{
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value)
        );
    }

    protected function segundo_apellido():Attribute{
        return new Attribute(
            get: fn($value) => ucwords($value),
            set: fn($value) => strtolower($value)
        );
    }



    //Relaciones

    public function document(){
        return $this->belongsTo(Document::class,'document_id','id');
    }

    public function estado(){
        return $this->belongsTo(Estado::class,'estado_id','id');
    }

    public function gender(){
        return $this->belongsTo(Gender::class,'gender_id','id');
    }

    public function phones(){
        return $this->hasMany(Phone::class,'user_id','id');
    }


    
    //Configuración adminlte
    public function adminlte_profile_url(){
        return 'profile/username';
    }

    public function adminlte_image(){
        return Auth::user()->url;
    }

    public function adminlte_desc(){

        return "Mienbro desde " . Auth::user()->created_at->day . " de " . Auth::user()->created_at->monthName . " del " . Auth::user()->created_at->year;
    }


}
