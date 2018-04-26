@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
        @slot('title') Создание Ингредиента @endslot
        @slot('active') <a href="{{route('admin.ingredient.index')}}"> Ингредиенты </a> @endslot
        @endcomponent

        <hr/>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" action="{{route('admin.ingredient.store')}}" method="post">
                    {{ csrf_field() }}

                    {{-- Form include --}}
                    @include('admin.ingredient.form')

                </form>
            </div>
        </div>


    </div>

@endsection