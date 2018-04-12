@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
        @slot('title') Список Блюд @endslot
        @slot('parent') Панель администратора @endslot
        @slot('active') Блюда @endslot
        @endcomponent

        <hr/>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                <a href="{{route('admin.dish.create')}}" class="btn btn-primary pull-right">
                    <i class="far fa-plus-square"> Создать блюдо</i>
                </a>
                <table class="table table-striped">
                    <thead>
                    <th>Наименование блюда</th>
                    <th>Ингредиенты</th>
                    <th>Активность</th>
                    <th class="text-right">Действия</th>
                    </thead>
                    <tbody>
                    @forelse($dishes as $dish)
                        <tr>
                            <td>{{$dish->name}}</td>
                            <td class="text-left">
                                <ul>
                                @foreach($dish->ingredients as $ingredient)
                                    <li>
                                        {{$ingredient->name}}
                                    </li>
                                @endforeach
                                </ul>


                            </td>
                            <td>
                                {{--Активность--}}
                                {{--<i class='fa fa-plus' aria-hidden="true"></i>
                               <i class='fa fa-minus' aria-hidden="true"></i>--}}
                            </td>
                            <td class="text-right">
                                <form onsubmit="if(confirm('Удалить?'))
                        {return true}else{return false}"
                                      action="#{{route('admin.dish.destroy', $dish)}}"
                                      method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{csrf_field()}}

                                    <a class="btn btn-default"
                                       href="{{route('admin.dish.edit', $dish)}}"
                                       data-toggle="tooltip"
                                       data-placement="left"
                                       title="Редактировать" {{--текст подсказки--}}
                                       data-trigger="hover">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <button type="submit" class="btn btn-danger"
                                            data-toggle="tooltip"
                                            data-placement="right"
                                            title="Удалить" {{--текст подсказки--}}
                                            data-trigger="hover">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center"><h2>Данные отсутствуют</h2></td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3">
                            <ul class="pagination pull-right">
                                {{$dishes->links()}}
                            </ul>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@stop
