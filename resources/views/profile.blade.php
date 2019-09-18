@extends('layouts.layout')

@section('title', 'Профиль')
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
        @if (isset($success))
            <div>
                {{ $success }}
            </div>
        @endif
        <form action="{{ route('profile.update') }}" method="POST">
            {{ csrf_field() }}
            ФИО
            <div>
                <input type="text" name="full_name" value="{{ $user->full_name }}">
            </div>

            Улица
            <div>
                <input type="text" name="street" value="{{ $user->street }}">
            </div>
            Дом
            <div>
                <input type="text" name="house" value="{{ $user->house }}">
            </div>
            Квартира
            <div>
                <input type="text" name="flat" value="{{ $user->flat }}">
            </div>
            День рождения
            <div>
                <input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}">
            </div>
            <br>
            <div>
                <input type="submit" value="Изменить">
            </div>
        </form>
    </div>
@endsection
