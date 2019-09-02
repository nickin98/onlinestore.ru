@extends('admin')

@section('content')
    <form class="form-horizontal">
        <h2>Просмотр категории</h2>
        <div class="form-group">
            <label for="inputCategory" class="control-label">Название категории:</label>
            <input type="categories" class="form-control" placeholder="Введите категорию" readonly>
        </div>
        <div class="form-group">
            <label for="inputSeoWords" class="control-label">Ключевые слова(keywords):</label>
            <textarea class="form-control" rows="4"
                      placeholder="Например: Шаурма, Дурум, Армянская шаурма, напитки, коктейли, мороженое, гонкогские вафли, купить, с доставкой (Запрещено использовать любые знаки пунктуации кроме запятой)" readonly></textarea>
        </div>
        <div class="form-group">
            <label for="inputSeoDescription" class="control-label">Описанием страницы(descriptions):</label>
            <textarea class="form-control" rows="4"
                      placeholder="Например: Продажа, доставка армянской шаурмы в Верхней Пышме. Только в ларьке ДУРУМ можно купить шаурму с гарантией на 3 года! (description не должен превышать 150 символов, должен быть написан человеческим языком, должен описывать содержимое страницы)" readonly></textarea>
        </div>
        <div class="form-group">
            <label for="inputAvailability" class="control-label">Отображать:  </label>
            <input type="checkbox" disabled="disabled" checked >
        </div>
    </form>
@endsection