@extends('layouts.layout')

@section('title', 'Востановление пароля')
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal logreg" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <label for="email" class="col-5 control-label">E-Mail Address</label>

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

        <div class="form-group">
            <div class="col-5">
                <button type="submit" class="btn btn-primary">
                    Отправить пароль на почту
                </button>
            </div>
        </div>
    </form>
@endsection