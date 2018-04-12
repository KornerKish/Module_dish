@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
        @slot('title') Редактирование блюда @endslot
        @slot('parent') Главная @endslot
        @slot('active') Блюдо @endslot
        @endcomponent

        <hr/>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal" action="{{route('admin.ingredient.update', $dish)}}" method="post">
                    <input type="hidden" name="_method" value="put">
                    {{ csrf_field() }}

                    {{-- Form include --}}
                    @include('admin.dish.form')

                </form>
            </div>
        </div>
    </div>

@endsection