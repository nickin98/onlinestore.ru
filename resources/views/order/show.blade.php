@extends('admin')

@section('content')
    <div class="wrapper">
        <h1>Заказ № {{ $order->id }}</h1>
        <table>
            <tr>
                <th>Имя: </th>
                <td>{{ $order->customer_name }}</td>
            </tr>
            <tr>
                <th>Номер телефона: </th>
                <td>{{ $order->customer()->first()->phone }}</td>
            </tr>
            <tr>
                <th>Улица:</th>
                <td>{{ $order->street }}</td>
            </tr>
            <tr>
                <th>Дом:</th>
                <td>{{ $order->house }}</td>
            </tr>
            <tr>
                <th>Квартира:</th>
                <td>{{ $order->flat }}</td>
            </tr>
            <tr>
                <th>Заказ:</th>
                <td>
                    <table>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Навзвание</th>
                            <th scope="col">Цена</th>
                            <th scope="col">Количество</th>
                        </tr>
                        @php
                            $total_price = 0;
                        @endphp
                        @foreach($products as $product)
                            @php
                                $product_amount = $order_product::where([
                                ['order_id', $order->id],
                                ['product_id', $product->id]
                                ])->first()->amount;
                                $product_price = $product->price;
                                $total_price += $product_price * $product_amount;
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product_price }}</td>
                                <td>{{ $product_amount }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Итог</td>
                            <td>{{ $total_price }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
@endsection
