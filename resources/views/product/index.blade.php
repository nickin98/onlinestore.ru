@extends('admin')

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
                            @if ($product->availability)
                                <td>Доступно</td>
                            @else
                                <td>Недоступно</td>
                            @endif
                            <td>
                                <a href="{{ route('products.show', $product->id) }}">
                                    просмотреть
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}">
                                    редактировать
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    @if ($product->availability == 1)
                                        <input type="submit" value="не показывать">
                                    @else
                                        <input type="submit" value="показывать">
                                    @endif
                                </form>
                                <a href="{{ route('products.create') }}">
                                    создать
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $products->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
