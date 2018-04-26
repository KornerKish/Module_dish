<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Ingredient;
use Illuminate\Http\Request;

class ModuleDishController extends Controller
{
    //
    public function index()
    {
        return view('index', [
            'active_ingredients' => Ingredient::activeIngredients(),
        ]);
    }

    public function find(Request $request)
    {
        $message = [
            'min' => 'Выберете минимум 2 ингрединета',
            'max' => 'Выберете максимум 5 ингредиентов',
        ];
        $this->validate($request, [
            'ingredients' => 'array|min:2|max:5',
        ], $message);

        $ingredients_ids = $request->input('ingredients');

        //поиск блюд по полному совпадению ингредиентов
        $dishes = Dish::whereHas('ingredients', function ($q) use ($ingredients_ids) {
            $q->whereIn('id', $ingredients_ids);
        }, '=', count($ingredients_ids))->get();
        foreach ($dishes as $dish) {
            if (count($ingredients_ids) == $dish->ingredients->count()) {
                $dishes_ingredients[] = $dish;
            }
        }

        //если полного совпадения нет, то до совпадения двух ингредиентов
        if (empty($dishes_ingredients)) {
            $dishes             = Dish::whereHas('ingredients', function ($q) use ($ingredients_ids) {
                $q->whereIn('id', $ingredients_ids);
            }, '>=', 2)->get();
            $dishes_ingredients = $dishes;
        }

        return view('findd', [
            'dishes_ingredients' => $dishes_ingredients,
            'active_ingredients' => Ingredient::activeIngredients(),
            'ingredients_ids'             => $ingredients_ids,
        ]);

    }
}
