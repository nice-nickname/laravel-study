<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8"/>
    <link rel="icon" type="image/x-icon" href="{{ asset("img/favicon.ico") }}"/>
    <link rel="stylesheet" href="{{ asset("css/styles.css") }}"/>
    <script src="{{ asset("js/script.js") }}"></script>
    <title>Войти</title>
</head>

<body class="background">
    <form action="{{ route("api.login") }}" method="POST">
        @csrf
        <div class="empty-page">
            <img src="{{ asset('img/logo.svg') }}" style="margin-bottom: 16px;">
            <div class="login-page-content white-color content-shadow" style="transition: all .09s ease-in-out;">
                <div class="login-page-content-in" id="login" style="transition: all .18s ease-in-out;">
                    <span class="text-size-20">
                        Войдите через социальные сети
                    </span>
                    <div class="socials-list">
                        <img src="{{ asset('img/icons/facebook.svg') }}" class="svg-primary">
                        <img src="{{ asset('img/icons/google.svg') }}" class="svg-primary">
                        <img src="{{ asset('img/icons/yahoo.svg') }}" class="svg-primary">
                    </div>
                    <span class="span-color-gray" style="margin-bottom: 8px;">
                        или
                    </span>
                    <div class="input-text white-color content-shadow">
                        <textarea rows="1" name="login_email" placeholder="Электронная почта" class="@error('login_email') invalid @enderror"
                        ></textarea>
                    </div>
                    <div class="input-text white-color content-shadow">
                        <input type="password" rows="1" name="login_password" placeholder="Пароль"  class="@error('login_password') invalid @enderror"></textarea>
                    </div>
                    <div class="blue-button content-shadow" onclick="submitForm('{{ route('api.login') }}')">
                        <a>
                            <span>
                                Войти
                            </span>
                        </a>
                    </div>
                    <span class="forget-password span-color-gray">
                        <a href="#" onclick="changeLogin()">Нет аккаунта?</a>
                    </span>
                </div>
                <div class="login-page-content-in hidden" id="register" style="transition: all .18s ease-in-out; opacity: 0;">
                    <span class="text-size-20">
                        Войдите через социальные сети
                    </span>
                    <div class="socials-list">
                        <img src="{{ asset('img/icons/facebook.svg') }}" class="svg-primary">
                        <img src="{{ asset('img/icons/google.svg') }}" class="svg-primary">
                        <img src="{{ asset('img/icons/yahoo.svg') }}" class="svg-primary">
                    </div>
                    <span class="span-color-gray" style="margin-bottom: 8px;">
                        или пройдите регистрацию
                    </span>
                    <div class="input-text white-color content-shadow">
                        <textarea  class="@error('registration_name') invalid @enderror" rows="1" name="registration_name" placeholder="Имя"></textarea>
                    </div>
                    <div class="input-text white-color content-shadow">
                        <textarea class="@error('registration_email') invalid @enderror" rows="1" name="registration_email" placeholder="Электронная почта"></textarea>
                    </div>
                    <div class="input-text white-color content-shadow">
                        <input type="password" class="@error('registration_password') invalid @enderror" rows="1" name="registration_password" placeholder="Пароль"></textarea>
                    </div>
                    <div class="input-text white-color content-shadow">
                        <input type="password" class="@error('registration_password_confirmation') invalid @enderror" rows="1" name="registration_password_confirmation" placeholder="Повторите пароль"></textarea>
                    </div>
                    <div class="blue-button content-shadow" onclick="submitForm('{{ route('api.registration') }}')">
                        <a>
                            <span>
                                Зарегистрироваться
                            </span>
                        </a>
                    </div>
                    <span class="forget-password span-color-gray">
                        <a href="#" onclick="changeLogin()">У вас уже есть аккаунт?</a>
                    </span>
                </div>
            </div>
        </div>
    </form>

    <footer id="footer" class="footer-bottom">
        <span>Все права защищены. Техническая поддержка help@email.com</span>
    </footer>
    <script>
        function submitForm(route) {
            let form = document.querySelector('form')
            form.action = route
            form.submit()
        }
    </script>
</body>

</html>