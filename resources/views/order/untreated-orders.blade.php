@extends('admin')

@section('content')
    <div class="adm-category">
        <div class="name-category">
            <div class="row">
                <h2 class="col-11">Незавершенные/Новые заказы</h2>
            </div>
        </div>
    </div>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Номер</th>
            <th>Имя</th>
            <th>Улица</th>
            <th>Дом</th>
            <th>Квартира</th>
            <th>Форма оплаты</th>
            <th>Время</th>
            <th>Комментарий</th>
            <th>Статус</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
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

{{--                    @if ($order->status == 1)--}}
{{--                        <td>Новый</td>--}}
{{--                    @elseif ($order->status == 2)--}}
{{--                        <td>Доставляется</td>--}}
{{--                    @elseif ($order->status == 3)--}}
{{--                        <td>Доставлен</td>--}}
{{--                    @endif--}}
                    <td>
                        <select name="status" id="status">
                            <option value="1" id="option1" {{ $order->status == 1 ? 'selected="selected"' : '' }}>Новый</option>
                            <option value="2" id="option2" {{ $order->status == 2 ? 'selected="selected"' : '' }}>Доставляется</option>
                            <option value="3" id="option3" {{ $order->status == 3 ? 'selected="selected"' : '' }}>Доставлен</option>
                        </select>
                    </td>
                    <td class="icon-table">
                        <a href="{{ route('orders.show', $order->id) }}"><img src="/images/admin/see_icon.png"></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src = "{{ asset('js/change-status.js') }}"></script>
@endsection
