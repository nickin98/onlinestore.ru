@extends('product.layouts.layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Доступность</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->availability }}</td>
                            <td>
                                <a href="#">
                                    просмотреть
                                </a>
                                <a href="#">
                                    редактировать
                                </a>
                                <a href="#">
                                    удалить
                                </a>
                                <a href="{{ route('products.create') }}">
                                    создать
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
