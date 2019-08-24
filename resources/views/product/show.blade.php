@extends('product.layouts.layout')

@section('content')
    <div class="wrapper">
        <h1>Продукт</h1>
        <table>
            <tr>
                <th>Название</th>
                <td>{{ $product->title }}</td>
            </tr>
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
                <td>{{ $product->image }}</td>
            </tr>
            <tr>
                <th>Доступность</th>
                <td>{{ $product->availability }}</td>
            </tr>
            <tr>
                <th>Категория</th>
                <td>{{ $product->category_id }}</td>
            </tr>
        </table>
    </div>
@endsection
