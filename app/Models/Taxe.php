<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taxe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'porcentaje'
    ];

    public function products(){
        return $this->hasMany(Product::class,'taxe_id','id');
    }

}
