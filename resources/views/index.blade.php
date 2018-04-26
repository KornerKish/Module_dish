@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h1 class="text-center">Поиск блюд</h1>
            <div class="col-sm-3 col-sm-offset-3">
                <form class="form-horizontal center-block" action="{{route('find')}}"
                      method="post">
                    {{ csrf_field() }}
                    @include('components.form')
                </form>
            </div>

            <div class="col-sm-6">

            </div>
        </div>
    </div>

@stop