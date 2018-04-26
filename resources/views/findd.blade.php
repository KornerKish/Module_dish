@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <a href="{{route('index')}}">
                <h1 class="text-center">Поиск блюд</h1>
            </a>

            <div class="col-sm-3 col-sm-offset-3">
                <form class="form-horizontal center-block">
                    <label for="ingredients">Выбрать ингредиенты:</label>
                    <select class="form-control" name="ingredients[]" id="ingredients" multiple="" size="15">
                        @foreach($active_ingredients as $ingredient)
                            <option value="{{$ingredient->id or ""}}"
                                    @foreach ($ingredients_ids as $ingredients_id)
                                    @if ($ingredient->id==$ingredients_id)
                                    selected="selected"
                                    disabled
                                    @endif
                                    @endforeach
                                    >
                                {{$ingredient->name}}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>


            <div class="col-sm-3">
                <label for="ingredients">Найденные ингредиенты:</label>
                @forelse($dishes_ingredients as $dish)
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$dish->name}}</h4>
                    </a>

                @empty
                    <a href="#" class="list-group-item alert-warning">
                        <h4 class="list-group-item-heading text-center">Ничего не найдено</h4>
                    </a>
                @endforelse
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

@stop