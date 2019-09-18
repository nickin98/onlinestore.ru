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
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}
        <h2>Добавление товара</h2>
        <div class="form-group">
            <label for="title">Наименование товара</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" placeholder="Например: Шаурма по маракански, Шаурма по Армянски">
        </div>
        <div class="form-group">
            <label for="category" >Категория товара</label><br>
            <select class="custom-select my-1 mr-sm-2" name="category" id="category"><br>
                @foreach($categories as $category)
                    <option>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="short_description">Краткое описание</label>
            <textarea class="form-control" rows="4" name="short_description" id="short_description" cols="30" rows="10" value="{{ old('short_description') }}" placeholder="Например: Сочная, острая и армянская"></textarea>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" rows="4" name="description" id="description" cols="30" rows="10" value="{{ old('description') }}" placeholder="Например: Сочная, острая и армянская"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="text" name="price" id="price" class="form-control" value="{{ old('price') }}" placeholder="Например: 100">
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="availability">Отображать:
                @if (old('availability') == 1)
                    <input type="checkbox" name="availability" id="availability" value="1" checked><br>
                @else
                    <input type="checkbox" name="availability" id="availability" value="1"><br>
                @endif
            </label>
        </div>
        <div class="form-group">
            <label for="main_active">Отображать на главной странице:
                @if (old('main_active') == 1)
                    <input type="checkbox" name="main_active" id="main_active" value="1" checked><br>
                @else
                    <input type="checkbox" name="main_active" id="main_active" value="1"><br>
                @endif
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-secondary">Добавить товар</button>
        </div>
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