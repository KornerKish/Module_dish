@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @if (!empty($errors->first('name')))
                <li>{{ $errors->first('name') }}</li>
            @endif
            @if(!empty($errors->first('ingredients')))
                <li>{{ $errors->first('ingredients') }}</li>
            @endif
        </ul>
    </div>
@endif

<label for="name">Название блюда</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Введите название блюда"
       value="@if(old('name')){{old('name')}}@else{{$dish->name or ""}}@endif" required>

<label for="recipe">Рецепт блюда</label>
<textarea class="form-control" id="recipe" name="recipe" required>
    @if(old('recipe')){{old('recipe')}}@else{{$dish->recipe or ""}}@endif
</textarea>


<label for="ingredients">Ингредиенты</label>
<select class="form-control" name="ingredients[]" id="ingredients" multiple="" size="4">
    @foreach($ingredients as $ingredient)
        {{--@foreach($dish->ingredient as $ingred)--}}
            <option value="{{$ingredient->id}}"
            {{--@if ($ingredient->id==$ingred->id) selected @endif--}}
            @if(old('ingredients')) selected @endif>{{$ingredient->name}}</option>
        {{--@endforeach--}}
    @endforeach
</select>

<hr/>

<input class="btn btn-primary" type="submit" value="Сохранить">