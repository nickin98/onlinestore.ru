@extends('layouts.layout')

@section('title', 'Авторизация')
@section('content')
    <div class="container">
        <form class="form-horizontal logreg" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
                <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                    <div class="row justify-content-center">
                        <label for="phone" class="col-5 control-label">Номер телефона</label>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-5 my-auto">
                            <input id="phone" type="tel" class="form-control" name="phone" value="{{ old('phone') }}"
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
                        <div class="col-5">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Запомнить
                                    меня
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="col-5">
                            <button type="submit"
                                    class="col-12 btn btn-outline-dark">
                                Войти
                            </button>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Забыли пароль?
                            </a>
                    </div>
                </div>
        </form>
    </div>
    <script src="{{ asset('js/jquery.maskedinput.js') }}"></script>
    <script>
        $("#phone").mask("+7(999) 999-99-99");
    </script>
@endsection
