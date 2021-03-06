@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
        @slot('title') Создание блюда @endslot
        @slot('active') <a href="{{route('admin.dish.index')}}"> Блюда </a> @endslot
        @endcomponent

        <hr/>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form class="form-horizontal" action="{{route('admin.dish.store')}}" method="post">
                    {{ csrf_field() }}

                    {{-- Form include --}}
                    @include('admin.dish.form')

                </form>
            </div>
        </div>


    </div>

@endsection