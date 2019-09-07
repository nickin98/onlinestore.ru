@extends('layouts.layout')

@section('title', 'Регистрация')
@section('content')
    <div class="container">
        <form class="form-horizontal logreg" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                <div class="row justify-content-center">
                    <label for="phone" class="col-5 control-label">Телефон</label>
                </div>
                <div class="row justify-content-center">
                    <div class="col-5">
                        <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                               required
                               autofocus>

                        @if ($errors->has('phone'))
                            <span class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <div class="row justify-content-center">
                    <label for="email" class="col-5 control-label">E-Mail адрес</label>
                </div>
                <div class="row justify-content-center">
                    <div class="col-5">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                               required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="row justify-content-center">
                    <label for="password" class="col-5 control-label">Пароль</label>
                </div>
                <div class="row justify-content-center">
                    <div class="col-5">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row justify-content-center">
                    <label for="password-confirm" class="col-5 control-label">Повторить пароль</label>
                </div>
                <div class="row justify-content-center">
                    <div class="col-5">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row justify-content-center">
                    <div class="col-5">
                        <button type="submit" class="col-12 btn btn-outline-dark">
                            Зарегистрироваться
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
