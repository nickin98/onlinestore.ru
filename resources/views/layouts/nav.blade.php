<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="/">DURUM</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1"
                aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">&#9776</span>
        </button>
        <div class="collapse justify-content-between navbar-collapse" id="navbar1">

            <ul class="navbarIndex navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarMenu" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Меню доставки</a>
                    <div class="dropdown-menu sub-menu" aria-labelledby="navbarMenu">
                        @foreach($categories as $category)
                            <a class="dropdown-item" href="{{ route('categories', $category->slug) }}">{{ $category->title }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('stock') }}">Акции</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aboutcompany') }}">О компании</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">Корзина (<span id="basket-price">0</span> ₽)</a>
                    </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
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
        </div>
    </div>
</nav>