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
            'ingredients'       => Ingredient::lastIngredients(5),
            'dishes'            => Dish::lastDishes(5),
            'count_ingredients' => Ingredient::count(),
            'count_dishes'      => Dish::count(),
        ]);
    }
}
