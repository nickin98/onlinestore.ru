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
    <form action="{{ route('categories.store') }}" method="post" class="form-horizontal">
        {{ csrf_field() }}
        <h2>Добавление категории</h2>
        <div class="form-group">
            <label for="inputCategory" class="control-label">Название категории:</label>
            <input type="categories" class="form-control" placeholder="Введите категорию" name="title" value="{{ old('title') }}">
        </div>
        <div class="form-group">
            <label for="inputSeoWords" class="control-label">Ключевые слова(keywords):</label>
            <textarea class="form-control" rows="4" name="seo_words"
                      placeholder="Например: Шаурма, Дурум, Армянская шаурма, напитки, коктейли, мороженое, гонкогские вафли, купить, с доставкой (Запрещено использовать любые знаки пунктуации кроме запятой)">{{ old('seo_words') }}</textarea>
        </div>
        <div class="form-group">
            <label for="inputSeoDescription" class="control-label">SEO описание(seo_description):</label>
            <textarea class="form-control" rows="4" name="seo_description"
                      placeholder="Например: Продажа, доставка армянской шаурмы в Верхней Пышме. Только в ларьке ДУРУМ можно купить шаурму с гарантией на 3 года! (description не должен превышать 150 символов, должен быть написан человеческим языком, должен описывать содержимое страницы)">{{ old('seo_description') }}</textarea>
        </div>
        <div class="form-group">
            <label for="inputAvailability" class="control-label">Отображать:
                @if (old('availability') == 1)
                    <input type="checkbox" name="availability" id="availability" value="1" checked><br>
                @else
                    <input type="checkbox" name="availability" id="availability" value="1"><br>
                @endif
            </label>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-secondary">Добавить категорию</button>
        </div>
    </form>
@endsection