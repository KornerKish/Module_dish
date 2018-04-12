@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            <li>{{ $errors->first('name') }}</li>
        </ul>
    </div>
@endif

<label for="name">Название ингредиента</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Название ингредиента"
       value="@if(old('name')){{old('name')}}@else{{$ingredient->name or ""}}@endif" required>
<br/>

<label for="active">Статус активности</label>
{{--@if (isset($ingredient->id))
    <input type="checkbox" class="checkbox" id="active" name="active"
           @if ($ingredient->active == 1) value="1" checked
           @elseif($ingredient->active == 0) value="0"
            @endif>
@else
    <input type="hidden" name="active" value="0">
    <input type="checkbox" class="checkbox" id="active" name="active" value="1" checked>
@endif--}}

<select class="form-control" name="active" id="active">
    @if (isset($ingredient->id))
        <option value="0" @if ($ingredient->active == 0) selected="" @endif>Не активный</option>
        <option value="1" @if ($ingredient->active == 1) selected="" @endif>Активный</option>
    @else
        <option value="1">Активный</option>
        <option value="0">Не активный</option>
    @endif
</select>

<hr/>

<input class="btn btn-primary" type="submit" value="Сохранить">