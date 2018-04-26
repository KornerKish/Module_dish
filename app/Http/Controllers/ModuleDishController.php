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

        //поиск блюд по полному совпадению или min 2 ингредиента
        $dishes = Dish::whereHas('ingredients', function ($q) use ($ingredients_ids) {
            $q->whereIn('id', $ingredients_ids);
        }, '>=', 2)->get();

        foreach ($dishes as $dish) {
            if ($dish->active == 1) {
                //проверка на полное совпадение
                if (count($ingredients_ids) == $dish->ingredients->count()) {
                    $dishes_ingredients_fullHits[] = $dish;
                } else {// частичное совпадение
                    $dishes_ingredients_dontFullHits[] = $dish;
                }
            }
        }
        if (!empty($dishes_ingredients_fullHits)) { //полное совпадение
            $dishes_ingredients = $dishes_ingredients_fullHits;
        }elseif(!empty($dishes_ingredients_dontFullHits)){ //частичное совпадение
            $dishes_ingredients=$dishes_ingredients_dontFullHits;
        }else //если нет совпадений то пусто
            $dishes_ingredients='';


        return view('findd', [
            'dishes_ingredients' => $dishes_ingredients,
            'active_ingredients' => Ingredient::activeIngredients(),
            'ingredients_ids'    => $ingredients_ids,
        ]);

    }
}
