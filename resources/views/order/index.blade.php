@extends('admin')

@section('content')

        <div class="adm-category">
            <div class="name-category">
                <div class="row">
                    <h2 class="col-11">Заказы</h2>
                    <a src="#"><img src="/images/admin/add_icon.png"></a>
                </div>
            </div>

        </div>
        <div class="table-category">
            <table class="table table-hover table-Light">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Улица</th>
                    <th scope="col">Дом</th>
                    <th scope="col">Квартира</th>
                    <th scope="col">Форма оплаты</th>
                    <th scope="col">Время</th>
                    <th scope="col">Комментарий</th>
                    <th scope="col">Номер телефона</th>
                    <th scope="col">Действия</th>

                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->street }}</td>
                        <td>{{ $order->house }}</td>
                        <td>{{ $order->flat }}</td>

                        @if ($order->form_payment == 1)
                            <td>Наличными</td>
                        @elseif ($order->form_payment == 2)
                            <td>Картой на сайте</td>
                        @elseif ($order->form_payment == 3)
                            <td>Картой курьеру</td>
                        @endif

                        @if ($order->near_time_delivery)
                            <td>Ближайшее</td>
                        @else
                            <td>{{ $order->exact_delivery_time }}</td>
                        @endif

                        <td>{{ $order->comment }}</td>
                        <td>{{ $order->phone }}</td>

                        <td class="icon-table">
                            <a href="{{ route('orders.show', $order->id) }}"><img src="/images/admin/see_icon.png"></a>
                            <a href="#"><img src="/images/admin/complete_order.png"></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    {{ $orders->links('vendor.pagination.bootstrap-4') }}
@endsection