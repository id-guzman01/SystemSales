<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stock';

    protected $fillable = [
        'product_id',
        'provider_id',
        'existencias'
    ];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function provider(){
        return $this->belongsTo(Provider::class,'provider_id','id');
    }

    public function entradas(){
        return $this->hasMany(Entrance::class,'stock_id','id');
    }

    public function departures(){
        return $this->hasMany(Departure::class,'stock_id','id');
    }


}
