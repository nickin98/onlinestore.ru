@extends('layouts.layout')

@section('content')
    <div class="container content">
        <form action="" method="POST">
            <label for="name" style="display: block">Имя</label>
            <input type="text" id="name" name="name" style="display: block">
            <label for="phone" style="display: block">Телефон</label>
            <input type="text" id="phone" name="phone" style="display: block">
            <label for="street" style="display: block">Улица</label>
            <input type="text" id="street" name="street" style="display: block">
            <label for="house" style="display: block">Дом</label>
            <input type="text" id="house" name="house" style="display: block">
            <label for="flat" style="display: block">Квартира</label>
            <input type="text" id="flat" name="flat" style="display: block">
            <label for="payment" style="display: block">Форма оплаты</label>
            <input type="radio" id="payment1" name="payment" checked>
            <label for="payment1">Наличными курьеру</label>
            <input type="radio" id="payment2" name="payment" style="margin-left: 20px">
            <label for="payment2">Картой на сайте</label>
            <input type="radio" id="payment3" name="payment" style="margin-left: 20px">
            <label for="payment3">Картой курьеру</label>
            <label for="time" style="display: block">Время доставки</label>
            <input type="radio" id="time1" name="time">
            <label for="time1">Ближайшее</label>
            <input type="radio" id="time2" name="time" style="margin-left: 20px">
            <label for="time2">Указать время</label>
            <input type="text" id="datepicker">
            <label for="comment" style="display: block">Комментарий</label>
            <textarea name="comment" id="comment" cols="50" rows="3" style="display: block"></textarea>
        </form>
    </div>
    <script>
    </script>
@endsection
