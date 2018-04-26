@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @if(!empty($errors->first('ingredients')))
                <li>{{ $errors->first('ingredients') }}</li>
            @endif
        </ul>
    </div>
@endif

<label for="ingredients">Выбрать ингредиенты</label>
<select class="form-control" name="ingredients[]" id="ingredients" multiple="" size="15">
    @foreach($active_ingredients as $ingredient)
        <option value="{{$ingredient->id or ""}}"
                {{--@isset($dish->id)
                @foreach($dish->ingredients as $ingredient_dish)
                @if ($ingredient->id==$ingredient_dish->id)
                selected="selected"
                @endif
                @endforeach
                @endisset
                @if(old('ingredients')) selected="selected" @endif--}}
                >
            {{$ingredient->name}}
        </option>
    @endforeach
</select>
</hr>
<input class="btn btn-primary" type="submit" value="Поиск">