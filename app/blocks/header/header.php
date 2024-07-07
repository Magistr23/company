<?php 
session_start();
use App\Controllers\listCompany;
use App\Modules\User;

function my_autoloader($users)
{
    include_once  $users . '.php';
}

spl_autoload_register('my_autoloader');

if(isset($_POST['reg'])) {
    if (!empty($_POST['nicname']) && !empty($_POST['pass']) && !empty($_POST['repeat-pass'])) {
        if ($_POST['pass'] === $_POST['repeat-pass']) {
            $user = new User;
            $user->userCreate($_POST['nicname'],$_POST['pass']);
        } else {
            $_SESSION['warning'] = 'Пароли не совпадают!';
        }
    } else {
        $_SESSION['warning'] = 'Заполнили не все поля!';
    }
} elseif (isset($_POST['aut'])) {
        $user = new User();
        $user->chek($_POST['nicname'],$_POST['pass']);
}
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
            <?php 
                if (isset($_SESSION['user']) || isset($_SESSION['admin']) ) {
                    echo "<a href='/app/view/out.php'>Выход</a>";
                } else {
                    echo '
                        <button class="btn" type="button" id="auth"><span>Вход</span></button>
                        <button class="btn" type="button" id="reg"><span>Регистрация</span></button>
                        ';
                }
                ?>
            </div>
        </div>
    </header>

    <div class="container aut" id="aut"> 
        <div class="popup-box"> 
            <h2>Авторизация</h2> 
            <form class="form-container" action="" method="post"> 

                <label class="form-label" for="nicname">ФИО:</label> 
                <input class="form-input" type="nicname" placeholder="Введите своё фио" id="nicname" name="nicname" required> 

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
            <form class="form-container" action="" method="post"> 
                <label class="form-label" for="nicname">ФИО:</label> 
                <input class="form-input" type="nicname" placeholder="Введите своё фио" id="nicname" name="nicname" required> 

                <label class="form-label" for="pass">Пароль:</label> 
                <input class="form-input" type="password" placeholder="Введите свой пароль" id="pass" name="pass" required>

                <label class="form-label" for="repeat-pass">Повторите пароль:</label> 
                <input class="form-input" type="password" placeholder="Повторите свой пароль" id="repeat-pass" name="repeat-pass" required>
  
                <button class="btn-submit" type="submit" name="reg"> Зарегестрироваться </button> 
            </form> 
  
            <button class="btn-close-popup" id="reg-close"> Закрыть </button> 
        </div> 
    </div> 
