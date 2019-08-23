@extends('product.layouts.layout')

@section('content')
    @if ($errors->any())
        <div class="bg-danger">
            @foreach($errors->all() as $error)
                {{ $error }}
                <br>
            @endforeach
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="post">
        {{ csrf_field() }}
        <label for="title" valu>Название</label><br>
        <input type="text" name="title" id="title" value="{{ old('title') }}"><br>
        <label for="description">Описание</label><br>
        <textarea name="description" id="description" cols="30" rows="10" value="{{ old('description') }}"></textarea><br>
        <label for="price">Цена</label><br>
        <input type="text" name="price" id="price" value="{{ old('price') }}"><br>
        <label for="image">Картинка</label><br>
        <input type="file" name="image" id="image"><br>
        <label for="availability">Доступность</label><br>
        <input type="checkbox" name="availability" id="availability" value="1"><br>
        <label for="category" >Категория</label><br>
        <select name="category" id="category"><br>
            @foreach($categories as $category)
                    <option>{{ $category->title }}</option>
            @endforeach
        </select>
        <input type="submit">
    </form>
@endsection

{{--<select name="category">--}}
{{--    @foreach($categories as $category)--}}
{{--        @if ($product->category_id == $category->id)--}}
{{--            <option selected>{{ $category->name }}</option>--}}
{{--        @else--}}
{{--            <option>{{ $category->name }}</option>--}}
{{--        @endif--}}
{{--    @endforeach--}}
{{--</select>--}}