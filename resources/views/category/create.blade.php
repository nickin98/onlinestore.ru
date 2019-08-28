@extends('admin')

@section('content')
<form class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail" class="col-xs-2 control-label">Название категории:</label>
        <div class="col-xs-10">
            <input type="categories" class="form-control" id="inputEmail" placeholder="Введите категорию">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-xs-2 control-label">Пароль:</label>
        <div class="col-xs-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="Введите пароль">
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            <div class="checkbox">
                <label><input type="checkbox"> Запомнить</label>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            <button type="submit" class="btn btn-default">Войти</button>
        </div>
    </div>
</form>
@endsection