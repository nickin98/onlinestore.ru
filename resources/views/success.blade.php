@extends('layouts.layout')

@section('content')
    <div class="container content">
       Заказ выполнен успешно
    </div>
    <script>
        localStorage.removeItem('cart');
    </script>
@endsection
