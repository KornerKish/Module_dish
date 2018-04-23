<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    //
    protected $fillable = ['name', 'recipe'];

    public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient');
    }


    public function scopeLastDishes($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }

    public function  scopeActiveDishes()
    {
        $count_active_dishes = Dish::count();
        $dishes              = Dish::all();
        foreach ($dishes as $dish)
            foreach ($dish->ingredients as $ingredient) {
                if ($ingredient->active == 0) {
                    --$count_active_dishes;
                    break;
                }
            }
        return $count_active_dishes;
    }
}
