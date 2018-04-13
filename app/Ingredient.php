<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name', 'active'];

    public function dishes()
    {
        return $this->belongsToMany('App\Dish');
    }

    public function scopeLastIngredients($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
