@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
        @slot('title') Создание блюда @endslot
        @slot('parent') Главная @endslot
        @slot('active') Блюда @endslot
        @endcomponent

        <hr/>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form class="form-horizontal" action="{{route('admin.dish.store')}}" method="post">
                    {{ csrf_field() }}

                    {{-- Form include --}}
                    @include('admin.dish.form')

                </form>
            </div>
        </div>


    </div>

@endsection