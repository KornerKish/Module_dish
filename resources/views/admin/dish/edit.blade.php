@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb_edit')
        @slot('title') Редактирование блюда @endslot
        @slot('item')<a href="{{route('admin.dish.index')}}"> Блюда </a>@endslot
        @slot('active') {{$dish->name}} @endslot
        @endcomponent

        <hr/>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" action="{{route('admin.dish.update', $dish)}}" method="post">
                    <input type="hidden" name="_method" value="put">
                    {{ csrf_field() }}

                    {{-- Form include --}}
                    @include('admin.dish.form')

                </form>
            </div>
        </div>
    </div>

@endsection