@extends('admin')

@section('content')
<form class="form-horizontal">
    <div class="form-group">
        <label for="inputCategory" class="col-xs-2 control-label">Название категории:</label>
        <div class="col-xs-10">
            <input type="categories" class="form-control"placeholder="Введите категорию">
        </div>
    </div>
    <div class="form-group">
        <label for="inputSeoWords" class="col-xs-2 control-label">Ключевые слова(keywords):</label>
        <div class="col-xs-10">
            <textarea class="form-control" rows="4"
                      placeholder="Например: Шаурма, Дурум, Армянская шаурма, напитки, коктейли, мороженое, гонкогские вафли, купить, с доставкой
                      (Запрещено использовать любые знаки пунктуации кроме запятой)"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="inputSeoDescription" class="col-xs-2 control-label">Описанием страницы(descriptions):</label>
        <div class="col-xs-10">
             <textarea class="form-control" rows="4"
                       placeholder="Например: Продажа, доставка армянской шаурмы в Верхней Пышме. Только в ларьке ДУРУМ можно купить шаурму с гарантией на 3 года!
(description не должен превышать 150 символов, должен быть написан человеческим языком, должен описывать содержимое страницы)"></textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="inputAvailability" class="col-xs-2 control-label">Отображать:  </label>
        <input type="checkbox" checked>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            <button type="submit" class="btn btn-default">Добавить категорию</button>
        </div>
    </div>
</form>
@endsection