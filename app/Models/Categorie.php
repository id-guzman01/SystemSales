<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    public function subcategories(){
        return $this->hasMany(Subcategorie::class,'subcategorie_id','id');
    }

}
