<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //
    protected $fillable = ['name', 'recipe', 'active'];

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }


    public function scopeLastDishes($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }


    //кол-во активных блюд
    public function  scopeActiveDishes($query)
    {
        return $query->where('active', 1)->get();
    }
}
