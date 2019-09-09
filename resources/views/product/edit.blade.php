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
        <h2>Редактирование товара</h2>
        <div class="form-group">
            <label for="title">Наименование товара</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $product->title }}" placeholder="Например: Шаурма по маракански, Шаурма по Армянски">
        </div>
        <div class="form-group">
            <label for="category" >Категория товара</label>
            <select class="custom-select my-1 mr-sm-2" name="category" id="category">
                @foreach($categories as $category)
                    @if ($category->id == $product->category_id)
                        <option selected>{{ $category->title }}</option>
                    @else
                        <option>{{ $category->title }}</option>
                    @endif
                @endforeach
            </select><br>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" rows="4" name="description" id="description" cols="30" rows="10" value="{{ old('description') }}" placeholder="Например: Сочная, острая и армянская">{{ $product->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ $product->price }}" placeholder="Например: 100">
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <img src="{{ $image }}" alt=""><br>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="availability">Отображать:
                <input type="checkbox" name="availability" id="availability" @if ($product->availability == 1) checked @endif value="1"><br>
            </label>
        </div>
        <div class="form-group">
            <label for="main_active">Отображать на главной странице:
                <input type="checkbox" name="main_active" id="main_active" @if ($product->main_active == 1) checked @endif value="1"><br>
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-secondary">Изменить товар</button>
        </div>
    </form>
@endsection
