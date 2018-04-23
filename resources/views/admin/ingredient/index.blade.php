@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumb')
        @slot('title') Список ингредиентов @endslot
        @slot('parent') Панель администратора @endslot
        @slot('active') Ингредиенты @endslot
        @endcomponent

        <hr/>
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
                <a href="{{route('admin.ingredient.create')}}" class="btn btn-primary pull-right">
                    <i class="far fa-plus-square"> Создать ингредиент</i>
                </a>
                <table class="table table-striped">
                    <thead>
                    <th>Наименование ингредиента</th>
                    <th>Активность</th>
                    <th class="text-right">Действия</th>
                    </thead>
                    <tbody>
                    @forelse($ingredients as $ingredient)
                        <tr>
                            <td>{{$ingredient->name}}</td>
                            <td class="text-center">@if ($ingredient->active=='1') <i class='fa fa-plus' aria-hidden="true"></i>
                                @elseif($ingredient->active=='0') <i class='fa fa-minus' aria-hidden="true"></i>
                                @endif
                            </td>
                            <td class="text-right">
                                <form onsubmit="if(confirm('Удалить?'))
                        {return true}else{return false}"
                                      action="{{route('admin.ingredient.destroy', $ingredient)}}"
                                      method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    {{csrf_field()}}

                                    <a class="btn btn-default" href="{{route('admin.ingredient.edit', $ingredient)}}"
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
                            <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="3">
                            <ul class="pagination pull-right">
                                {{$ingredients->links()}}
                            </ul>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@stop
