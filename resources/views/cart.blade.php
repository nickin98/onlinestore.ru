@extends('layouts.layout')

@section('content')
    <script src="{{ asset('js/open-cart.js') }}" defer></script>
    <div class="container content">
{{--        <img class="rounded mx-auto d-block" id="cart" src="images/cart.png">--}}
        <div class="row">
            <!-- Корзина контейнер -->
        </div>
{{--        <div class="row">--}}
{{--            <p class="col text-center">Но это легко поправить! <a href="/">Отправляйтесь за покупками</a>  или авторизуйтесь чтобы увидеть уже добавленные товары.</p>--}}
{{--        </div>--}}
{{--        {{ $products->links('vendor.pagination.bootstrap-4') }}--}}
    </div>
@endsection
