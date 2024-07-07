<?php 
use App\Modules\AddCompany;
use App\Modules\User;

include_once 'app/blocks/header/header.php';
echo "<div class='main'>";

if (isset($_POST['aut'])) {
    $user = new User();
    $user->chek($_POST['nicname'],$_POST['pass']);
}
$dirLogo = 'app/img/logo/';
if (isset($_POST['add-company'])) {
    if (isset($_POST['title']) && isset($_POST['desc'])) {
        if (isset($_FILES['file'])) {
            move_uploaded_file($_FILES["file"]["tmp_name"], $dirLogo.$_FILES['file']['name']); 
            $addCompany = new AddCompany();
            $addCompany->createCompany($_POST['title'], $dirLogo.$_FILES['file']['name'] ,$_POST['desc']);
        }
    }
}

if (isset($_SESSION['admin']) && $_SESSION['admin']['role'] == 1) {
    if (!isset($_GET['company'])) {
        if(!isset($_GET['comment'])) {
            ?>
            <div class="create-company main">
            <h2>Создание копании</h2>
                <form action="" method="post" class="admin" enctype="multipart/form-data">
                    <label for="company"> Название компании</label>
                    <input type="text" name="title" id="company">

                    <input type="file" name="file">

                    <label for="desc"> Описание компании</label>
                    <textarea type="text" name="desc" id="desc"></textarea>

                    <input type="submit" name="add-company">
                    <input type="reset">
                </form>
            </div>
        <?php
        }
    }
    include 'app/view/company.php';
} elseif (isset($_SESSION['user'])) {
    echo "<div class='main'>";
    echo 'Вы уже авторизованы! И не являетесь админом, вам тут делать не чего';
    echo "</div>";
} else {
    ?>
    <div class="container-form aut main form" id="aut"> 
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
        </div> 
    </div>
    <?php
    }
    echo "</div>";
include_once 'app/blocks/footer/footer.php'; 