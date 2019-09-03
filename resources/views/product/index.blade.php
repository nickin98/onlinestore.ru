@extends('admin')

@section('content')
    <div class="adm-category">
        <div class="name-category">
            <div class="row">
                <h2 class="col-11">Товары</h2>
                <a href="{{ route('products.create') }}"><img src="/images/admin/add_icon.png"></a>
            </div>
        </div>
    </div>
    <div class="table">
        <table class="table table-hover table-Light">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
                <th scope="col">Доступность</th>
                <th scope="col">Действия</th>
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
                    <td class="icon-table">
                        <div class="row">
                            <a class="col-1" href="{{ route('products.show', $product->id) }}">
                                <img src="/images/admin/see_icon.png">
                            </a>
                            <a class="col-1" href="{{ route('products.edit', $product->id) }}">
                                <img src="/images/admin/edit_icon.png">
                            </a>
                            <input class="col-1" type="submit" value="" id="delButton"/>
                            {{-- <a href="{{ route('categories.destroy', $category->id) }}"><img src="/images/admin/delete_icon.png"></a>--}}
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                @if ($product->availability == 1)
                                    <input type="submit" class="btn btn-secondary" value="Не отображать">
                                @else
                                    <input type="submit" class="btn btn-secondary" value="Отображать">
                                @endif
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $products->links('vendor.pagination.bootstrap-4') }}
@endsection
