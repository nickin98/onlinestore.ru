@extends('admin')

@section('content')
    <div class="wrapper">
        <h1>Заказ № </h1>
        <table>
            <tr>
                <th>ФИО: </th>
                <td>ФАМИЛИЯ ИМЯ ОТЧЕСТВО</td>
            </tr>
            <tr>
                <th>Номер телефона: </th>
                <td>8912664394</td>
            </tr>
            <tr>
                <th>Адрес:</th>
                <td>ул. Пушкина д. Колотушкина</td>
            </tr>
            <tr>
                <th>Заказ:</th>
                <td><a href="#">Шаурма</a></td>
                <td><a href="#">Коктейли</a></td>
            </tr>
        </table>
    </div>
@endsection
