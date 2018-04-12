<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use App\Ingredient;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        return view('admin.dish.index', [
            'dishes' => Dish::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.dish.create', [
            'dish'        => '',
            'ingredients' => Ingredient::all(),
        ]);
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
            'unique' => 'Блюдо с таким названием уже существует, введите другое название',
            'min'    => 'Выберете минимум 2 ингрединета',
            'max'    => 'Выберете максимум 5 ингредиентов',
        ];
        $this->validate($request, [
            'name'        => 'required|string|max:50|unique:dishes',
            'ingredients' => 'array|min:2|max:5',
        ], $massage);

        $dish = Dish::create($request->all());

        //Categories
        if ($request->input('ingredients')):
            $dish->ingredients()->attach($request->input('ingredients'));
        endif;

        return redirect()->route('admin.dish.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dish.edit',[
            'dish' => $dish,
            'ingredients'=> Ingredient::all(),
        ]);

        /*return view('admin.articles.edit',[
            'article' => $article,
            'categories' => Category::with('children')->where('parent_id', '0')->get(),
            'delimiter'  => ''
        ]);*/
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        //
    }
}
