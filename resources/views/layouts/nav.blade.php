<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="/">DURUM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1"
                aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">&#9776</span>
        </button>
        <div class="collapse justify-content-between navbar-collapse" id="navbar1">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Меню доставки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Акции</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">О компании</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#ModalLogin" href="#">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#ModalRegister" href="#">Регистрация</a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                            Выход
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endguest
            </ul>
            @include("auth.login")
            @include("auth.register")
            <script>
                $("#phone").mask("+7(999) 999-99-99");
            </script>
        </div>
    </div>
</nav>