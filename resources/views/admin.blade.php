<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ADMIN</title>
    <meta name="keywords" content="keywords">
    <meta name="description" content="description_site">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS -->
    <link  href="/css/astyle.css" rel="stylesheet"/>
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="admin-menu col-lg-2">
                <div class="nav flex-column" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link" href="/admin">Главная</a>
                    <a class="nav-link" href="/admin/categories">Категории</a>
                    <a class="nav-link" href="/admin/products">Товар</a>
                    <a class="nav-link" href="/admin/orders" >Заказы</a>
                    <a class="nav-link" href="{{ route('new') }}" >Незавершенные/Новые заказы</a>
                    <a class="nav-link" href="/">Выйти из админ панели</a>
                </div>
            </div>
            <div class="content-admin col-lg-10">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>