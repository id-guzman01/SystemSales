<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'nit',
        'direccion',
        'email'
    ];

    public function stock(){
        return $this->hasMany(Stock::class,'provider_id','id');
    }

}
