@extends('admin.layouts.app_admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="jumbotron">
                    <a href="{{route('admin.ingredient.index')}}">
                        <p class="text-center">
                            <span class="label label-primary">Кол-во ингредиентов {{$count_ingredients}}</span>
                        </p>
                    </a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="jumbotron">
                    <a href="{{route('admin.ingredient.index')}}">
                        <p class="text-center">
                            <span class="label label-primary">Кол-во блюд {{$count_dishes}}</span>
                        </p>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <a href="{{route('admin.ingredient.create')}}" class="btn btn-block btn-primary">Создать ингредиент</a>
                @foreach($ingredients as $ingredient)
                    <a href="{{route('admin.ingredient.edit', $ingredient)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$ingredient->name}}</h4>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-6">
                <a href="{{route('admin.dish.create')}}" class="btn btn-block btn-primary">Создать блюдо</a>
                @foreach($dishes as $dish)
                    <a href="{{route('admin.dish.edit', $dish)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$dish->name}}</h4>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@stop