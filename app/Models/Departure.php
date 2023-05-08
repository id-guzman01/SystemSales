<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    use HasFactory;

    protected $fillable = [
        'stock_id',	
        'cantidad'
    ];

    public function stock(){
        return $this->belongsTo(Stock::class,'stock_id','id');
    }

}
