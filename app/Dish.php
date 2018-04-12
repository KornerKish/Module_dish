<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //
    protected $fillable = ['name', 'recipe'];

    public function ingredients(){
        return $this->belongsToMany('App\Ingredient');
    }
}
