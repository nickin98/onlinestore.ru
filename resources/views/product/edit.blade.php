@extends('admin')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                {{ $error }}
                <br>
            @endforeach
        </div>
    @endif
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <label for="title">Название</label><br>
        <input type="text" name="title" id="title" value="{{ $product->title }}"><br>
        <label for="description">Описание</label><br>
        <textarea name="description" id="description" cols="30" rows="10">{{ $product->description }}</textarea><br>
        <label for="price">Цена</label><br>
        <input type="text" name="price" id="price" value="{{ $product->price }}"><br>
        <label for="image">Картинка</label><br>
        <img src="{{ $image }}" alt=""><br>
        <input type="file" name="image" id="image"><br>
        <label for="availability">Доступность</label><br>
        <input type="checkbox" name="availability" id="availability" @if ($product->availability == 1) checked @endif value="1"><br>
        <label for="category" >Категория</label><br>
        <select name="category" id="category"><br>
            @foreach($categories as $category)
                @if ($category->id == $product->category_id)
                    <option selected>{{ $category->title }}</option>
                @else
                    <option>{{ $category->title }}</option>
                @endif
            @endforeach
        </select><br>
        <input type="submit">
    </form>
@endsection
