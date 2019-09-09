@extends('admin')

@section('content')
    <div class="wrapper">
        <h1>Продукт {{ $product->title }}</h1>
        <table>
            <tr>
                <th>Описание</th>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <th>Цена</th>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <th>Картинка</th>
                <td><img src="{{ $image }}" alt="{{ $product->title }}"></td>
            </tr>
            <tr>
                <th>Доступность</th>
                @if ($product->availability)
                    <td>Доступно</td>
                @else
                    <td>Недоступно</td>
                @endif
            </tr>
            <tr>
                <th>Отображать на главной странице</th>
                @if ($product->main_active)
                    <td>Отображать</td>
                @else
                    <td>Не отображать</td>
                @endif
            </tr>
            <tr>
                <th>Категория</th>
                <td>{{ $categoryTitle }}</td>
            </tr>
        </table>
    </div>
@endsection
