@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
        @slot('title') Редактирование ингредиента @endslot
        @slot('item') <a href="{{route('admin.ingredient.index')}}"> Ингредиенты </a> @endslot
        @slot('active') {{$ingredient->name}} @endslot
        @endcomponent

        <hr/>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" action="{{route('admin.ingredient.update', $ingredient)}}" method="post">
                    <input type="hidden" name="_method" value="put">
                    {{ csrf_field() }}

                    {{-- Form include --}}
                    @include('admin.ingredient.form')

                </form>
            </div>
        </div>
    </div>

@endsection