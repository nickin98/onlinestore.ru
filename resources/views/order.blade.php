@extends('layouts.layout')

@section('content')
    <div class="container content">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                    <br>
                @endforeach
            </div>
        @endif
        <form action="{{ route('send') }}" method="POST">
            {{ csrf_field() }}
            <label for="name" style="display: block">Имя</label>
            <input type="text" id="name" name="name" style="display: block" value="{{ old('name') }}">
            <label for="phone" style="display: block">Телефон</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" style="display: block">
            <label for="email" style="display: block">Email</label>
            <input type="text" id="email" name="email" style="display: block" value="{{ old('email') }}">
            <label for="street" style="display: block">Улица</label>
            <input type="text" id="street" name="street" style="display: block" value="{{ old('street') }}">
            <label for="house" style="display: block">Дом</label>
            <input type="text" id="house" name="house" style="display: block" value="{{ old('house') }}">
            <label for="flat" style="display: block">Квартира</label>
            <input type="text" id="flat" name="flat" style="display: block" value="{{ old('flat') }}">
            <label for="payment" style="display: block">Форма оплаты</label>
            <input type="radio" id="payment1" name="payment" checked value="1">
            <label for="payment1">Наличными курьеру</label>
            <input type="radio" id="payment2" name="payment" style="margin-left: 20px" value="2">
            <label for="payment2">Картой на сайте</label>
            <input type="radio" id="payment3" name="payment" style="margin-left: 20px" value="3">
            <label for="payment3">Картой курьеру</label>
            <label style="display: block" >Время доставки</label>
            <input type="radio" id="delivery1" name="delivery" checked value="1">
            <label for="delivery1">Ближайшее</label>
            <input type="radio" id="delivery2" name="delivery" style="margin-left: 20px" value="2">
            <label for="delivery2">Указать время</label><br>
            <div id="datetime" style="display: none">
                <input type="text" id="date" readonly="true" name="date">
                <select name="time" id="time">
                    <option>10:00</option>
                    <option>11:00</option>
                    <option>12:00</option>
                    <option>13:00</option>
                    <option>14:00</option>
                    <option>15:00</option>
                    <option>16:00</option>
                    <option>17:00</option>
                    <option>18:00</option>
                    <option>19:00</option>
                    <option>20:00</option>
                </select>
            </div>
            <label for="comment" style="display: block">Комментарий</label>
            <textarea name="comment" id="comment" cols="50" rows="3" style="display: block">{{ old('comment') }}</textarea>
            <input type="hidden" name="cart" value="" id="cart"><br>
            <input type="submit" value="Отправить заказ">
        </form>
    </div>
    <script src="{{ asset('js/time.js') }}"></script>
    <script> $("#cart").attr("value", localStorage.getItem('cart'))</script>
    <!-- Scripts -->
    <script src="{{ URL::asset('js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.maskedinput.js') }}"></script>
    <script>
        $("#phone").mask("+7(999) 999-99-99");
    </script>
@endsection
