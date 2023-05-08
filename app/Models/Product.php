<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'especificaciones',
        'subcategorie_id',
        'discount_id',
        'taxe_id',
        'state_id',
        'precio',
    ];

    public function stock(){
        return $this->hasMany(Stock::class,'product_id','id');
    }

    public function subcategorie(){
        return $this->belongsTo(Subcategorie::class,'subcategorie_id','id');
    }

    public function discount(){
        return $this->belongsTo(Discount::class,'discount_id','id');
    }

    public function state(){
        return $this->belongsTo(State::class,'state_id','id');
    }

    public function photos(){
        return $this->hasMany(Photo::class,'product_id','id');
    }

    public function texes(){
        return $this->belongsTo(Taxe::class,'taxe_id','id');
    }



}
