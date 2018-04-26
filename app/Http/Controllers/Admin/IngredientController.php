<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ingredient.index', [
            'ingredients' => Ingredient::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ingredient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $massage = [
            'unique' => 'Такой ингредиет уже существует, введите другой',
        ];
        $this->validate($request, [
            'name' => 'required|string|max:50|unique:ingredients',
        ], $massage);

        Ingredient::create($request->all());
        return redirect()->route('admin.ingredient.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        return view('admin.ingredient.edit', [
            'ingredient' => $ingredient,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $ingredient->update($request->all());

        $ingredient_name = $request->input('name');
        $ingredient_id   = Ingredient::all()->where('name', $ingredient_name)->first();
        $ingredient_id   = $ingredient_id->id;
        //поиск блюд которіе включают отредактированный ингредиент
        $dishes = Dish::whereHas('ingredients', function ($q) use ($ingredient_id) {
            $q->where('id', $ingredient_id);
        })->get();
        //перебор ингредиентов каждого блюда и определение активности блюда
        foreach ($dishes as $dish) {
            foreach ($dish->ingredients as $ingredient) {
                $active = 1;
                if ($ingredient->active == 0) {
                    $active = 0;
                    break;
                }
            }
            //внесение изменений в базу данных активности блюда
            $dish_req[]         = $dish;
            $dish_req['active'] = $active;

            $dish->update($dish_req);
        }

        return redirect()->route('admin.ingredient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();
        return redirect()->route('admin.ingredient.index');
    }
}
