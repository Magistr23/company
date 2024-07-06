<?php 

use App\Controllers\Connect;

spl_autoload_register(function ($class) {
    include $class . '.php';
});

$db = new Connect();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/blocks/style.css" type="text/css">

    <title>Отзывы</title>
</head>
<body>
    <header>
        <div class="main flex">
            <h1>Отзывы о компаний</h1>
            <div class="main-button">
                <button class="btn" type="button" id="auth"><span>Вход</span></button>
                <button class="btn" type="button" id="reg"><span>Регистрация</span></button>
            </div>
        </div>
    </header>

    <div class="container aut" id="aut"> 
        <div class="popup-box"> 
            <h2>Авторизация</h2> 
            <form class="form-container" action="/app/modules/user.php" method="post"> 

                <label class="form-label" for="aut-email">Почта:</label> 
                <input class="form-input" type="email" placeholder="Введите свою почту" id="aut-email" name="email" required> 

                <label class="form-label" for="aut-pass">Пароль:</label> 
                <input class="form-input" type="password" placeholder="Введите свой пароль" id="aut-pass" name="pass" required>

                <label class="form-label" for="aut-repeat-pass">Повторите пароль:</label> 
                <input class="form-input" type="password" placeholder="Повторите свой пароль" id="aut-repeat-pass" name="repeat-pass" required>
  
                <button class="btn-submit" type="submit" name="aut"> Войти </button> 
            </form> 
  
            <button class="btn-close-popup" id="aut-close"> Закрыть </button> 
        </div> 
    </div> 

    <div class="container form-reg" id="form-reg"> 
        <div class="popup-box"> 
            <h2>Регистрация</h2> 
            <form class="form-container" action="/app/modules/user.php" method="post"> 
                <label class="form-label" for="nicname">ФИО:</label> 
                <input class="form-input" type="nicname" placeholder="Введите своё фио" id="nicname" name="nicname" required> 

                <label class="form-label" for="email">Почта:</label> 
                <input class="form-input" type="email" placeholder="Введите свою почту" id="email" name="email" required> 

                <label class="form-label" for="pass">Пароль:</label> 
                <input class="form-input" type="password" placeholder="Введите свой пароль" id="pass" name="pass" required>

                <label class="form-label" for="repeat-pass">Повторите пароль:</label> 
                <input class="form-input" type="password" placeholder="Повторите свой пароль" id="repeat-pass" name="repeat-pass" required>
  
                <button class="btn-submit" type="submit" name="reg"> Зарегестрироваться </button> 
            </form> 
  
            <button class="btn-close-popup" id="reg-close"> Закрыть </button> 
        </div> 
    </div> 
