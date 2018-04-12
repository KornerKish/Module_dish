@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
        @slot('title') Создание Ингредиента @endslot
        @slot('parent') Главная @endslot
        @slot('active') Ингредиенты @endslot
        @endcomponent

        <hr/>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal" action="{{route('admin.ingredient.store')}}" method="post">
                    {{ csrf_field() }}

                    {{-- Form include --}}
                    @include('admin.ingredient.form')

                </form>
            </div>
        </div>


    </div>

@endsection