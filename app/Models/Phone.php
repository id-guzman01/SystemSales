<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code_id',
        'numero'
    ];

    public function users(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function codes(){
        return $this->belongsTo(Code::class,'code_id','id');
    }

}
