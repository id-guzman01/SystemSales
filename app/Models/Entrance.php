<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrance extends Model
{
    use HasFactory;

    protected $table = 'entrances';

    protected $fillable = [
        'stock_id',
        'cantidad'
    ];

    public function entradas_productos(){
        return $this->belongsTo(Stock::class,'stock_id','id');
    }


}
