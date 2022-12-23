<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8"/>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset("css/styles.css") }}"/>
    <script src="{{ asset("js/script.js") }}"></script>
    <title>Главная страница</title>
</head>

<body class="background-color" style="overflow-x: hidden;">
    <div class="preview hidden">
        <div class="preview-author">
            <img  name="preview-image" class="author-logo" src="{{ asset("img/dostoevski.jpg") }}" alt="">
            <span name="preview-name" class="author-name">Федор Михайлович Достоевский</span>
            <span name="preview-years">1821-1881</span>
        </div>
    </div>
    <header>
        <a href="{{ route('home') }}">
            <img class="ic-size-64" src="{{ asset("img/logo.svg") }}">
        </a>  
        <div class="navigation-buttons" id="navigation-buttons-0">
            <div class="header-button">
                <a href="{{ route("home") }}">
                    <span>
                        Книги
                    </span>
                </a>
            </div>
            <div class="header-button">
                <a href="{{ route("home") }}">
                    <span>
                        Лучшие предложения
                    </span>
                </a>
            </div>
            <div class="header-button">
                <a href="{{ route("about") }}">
                    <span>
                        О магазине
                    </span>
                </a>
            </div>
            <div class="header-button" id="find-button" onclick="openFind()">
                <span>
                    Искать книгу
                </span>
            </div>
        </div>
        <div class="find-row hidden white-color" id="find-row">
            <textarea name="search" form="item_form" rows=1 placeholder="Искать книгу" value="@yield('search-value')"></textarea>
            <img class="icon icon-active icon-search" src="{{ asset("img/icons/magnify.svg") }}" >
            <img class="icon icon-active" src="{{ asset("img/icons/close-thick.svg") }}" onclick="openFind()" >
        </div>
        <div class="navigation-buttons header-reverse" id="navigation-buttons-1">
            @auth("web")
                <a href="{{ route('logout') }}">
                    <img class="svg-white ic-size-48" src="./img/icons/logout.svg">
                </a>
                <a href="{{ route('bucket') }}">
                    <img class="svg-white ic-size-48" src="./img/icons/cart-outline.svg">
                </a>
                <a href="{{ route('account') }}">
                    <img class="svg-white ic-size-48" src="./img/icons/account.svg">
                </a>
                <span class="header-name">
                    {{ Auth::user()->name }}
                </span>
            @endauth
            @guest
                <div class="header-button">
                    <a href="{{ route("login") }}">
                        <span>
                            Войти
                        </span>
                    </a>
                </div>
            @endguest
        </div>
    </header>

    <div class="page-content white-color @yield('content-class')">
        @yield('content')
    </div>
    <footer id="footer">
        <div class="scroll-button">
            <i class="up"></i>
        </div>
        <span>Все права защищены. Техническая поддержка help@email.com</span>
    </footer>
    <script>
    </script>
</body>

</html>
