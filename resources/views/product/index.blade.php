@extends('product.layouts.layout')

@section('content')
    <table class="table table-inverse">
        <thead>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>price</th>
            <th>availability</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">1</th>
                <td>{{ $product->title }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->availability }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
