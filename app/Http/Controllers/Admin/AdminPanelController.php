<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Ingredient;

class AdminPanelController extends Controller
{
    public function adminPanel()
    {
        return view('admin.admin_panel', [
            'ingredients'              => Ingredient::lastIngredients(7),
            'count_all_ingredients'    => Ingredient::count(),
            'count_active_ingredients' => Ingredient::activeIngredients()->count(),

            'dishes'                   => Dish::lastDishes(7),
            'count_all_dishes'         => Dish::count(),
            'count_active_dishes'      => Dish::activeDishes()->count(),
        ]);
    }
}
