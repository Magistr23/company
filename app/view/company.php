<?php

use App\Modules\AddCompany;
use App\Modules\Comment;
use App\Modules\listCom;


//Подключение модулей
$list = new listCom();
$company = new AddCompany();
$listComment = new Comment();

//Удаление компании
if (isset($_POST['del'])) {
    $company->delCompanys($_POST['id']);
}
//редактирование компании
if (isset($_POST['edit'])) {
    $company->editCompanys($_POST['title_company'], $_POST['text_company'],$_POST['id']);
}

//обработка файлов
$dirComment = 'app/img/img/';
if (isset($_GET['comment']) && is_numeric($_GET['comment'])) {
    include_once 'app/view/comment.php';
} else {
    if (isset($_POST['add-comment'])) {
        if (isset($_POST['fio']) && isset($_POST['comment']) && is_numeric($_GET['company'])) {
            if (isset($_FILES['file'])) {
                $fileName = uniqid('php_');
                $dir = $dirComment.$fileName.$_FILES['file']['name'];
                move_uploaded_file($_FILES["file"]["tmp_name"], $dir); 
                $createComment = new Comment();
                $createComment->createComment($_POST['fio'],$dir,$_POST['comment'], $_GET['company']);
            }
        }
    }
    //если админ, то выводит админ кнопки
    if (isset($_GET['company']) && is_numeric($_GET['company'])) {
        if (isset($_SESSION['admin']['role']) && $_SESSION['admin']['role'] == 1) {
            ?>
    
            <form action="" method="post">
                <input type="hidden" name="id" value="<?=$_GET['company']?>">
                <input type="submit" value="Удалить полностью" name="del">
                <input type="submit" value="редактировать" name="edit">
            <?php
    
        }
        $comp = $list->ListOne($_GET['company']);
        ?>
        <div class="company main">
            <div class="company-title">
                <h2>
                    <?php
                    //если админ, то выводит админ поле
                    if (isset($_SESSION['admin']['role']) && $_SESSION['admin']['role'] == 1) {
                        ?>
                        <input type="text" name="title_company" value="<?=$comp['title']?>">
                        <?php
                    } else {
                        echo $comp['title'];
                    }
                    
                    ?>
                </h2>
            </div>
            <div class="company-body">
                <div class="company-photo">
                    <img src="<?=$comp['logo']?>" alt="">
                </div>
                <div class="company-info">
                    <?php
                    //если админ, то выводит админ поле
                if (isset($_SESSION['admin']['role']) && $_SESSION['admin']['role'] == 1) {
                        ?>
                        <textarea type="text" name="text_company" value="<?=$comp['description']?>"><?=$comp['description']?></textarea>
                        <?php
                    } else {
                        echo $comp['description'];
                    }
                    ?>
                </div>
            </div>
            </form>
            <form action="" class="admin" method="post" enctype="multipart/form-data">
                <label for="fio"> Напишите своё фио</label>
                <input type="text" id="fio" name="fio">

                <input type="file" name="file" id="">

                <label for="text"> Напишите свой коментарий</label>
                <textarea name="comment" id="text">
                </textarea>

                <input type="submit" name="add-comment">
            </form>
        </div>
        
        <?php
        //вывод компаний
        $list = $listComment->listCommentALL($_GET['company']);
        echo "<div class='main comment'>";
        echo "<h2>Коментарии</h2>";
        foreach ($list as $listComment) {
            ?>
            <div class="comment-title">
                <?= $listComment['fio'] ?>
            </div>
            <div class="comment-info">
                <a href="?comment=<?=$listComment['id']?>">
                <?php
                echo mb_strimwidth($listComment['comment'],0,100,'...');
                ?>
                </a>
            </div>
            <div class="comment-foto">
                <img src="<?=$listComment['photo'] ?>" alt="">
            </div>
            <?php   
        }
        echo "</div>";
        //если админ, то выводит коменты на подтерждения
        if (isset($_SESSION['admin']['role']) && $_SESSION['admin']['role'] == 1) {
            $listComment = new Comment();
            $list = $listComment->commentALL($_GET['company']);

            foreach ($list as $listComment) {
                ?>
                <div class="comment-title">
                    <?= $listComment['fio'] ?>
                    <p>Ждёт подтверждения</p>
                </div>
                <div class="comment-info">
                    <a href="?comment=<?=$listComment['id']?>">
                    <?php
                    echo mb_strimwidth($listComment['comment'],0,100,'...');
                    ?>
                    </a>
                </div>
                <div class="comment-foto">
                    <img src="<?=$listComment['photo'] ?>" alt="">
                </div>
                <?php   
            }
        }
    } else {
//пагинация
        if (is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else $page = 1;
        $per_page = 5;

        $countcomp = $list->listCountAll();
        $comp = $list->listAll($page, $per_page);
        echo "<div class='company main'>";
        foreach ($comp as $list) {
            ?>
            <div class="company-list">
                <div class="company-title">
                    <a href="?company=<?=$list['id']?>"><?= $list['title']?></a>
                </div>
                <div class="company-info">
                    <div class="company-logo">
                        <img src="<?=$list['logo']?>" alt="">
                    </div>
                    <div class="company-desc">
                        <?=$list['description']?>
                    </div>
                </div>
            </div>

            <?php
        }
        echo "</div>";

        for ($I=1; $I<=ceil($countcomp['quantity']/$per_page); $I++) {
            if ($page == $I) echo $I.'&nbsp;&nbsp;';
            else echo '<a href="?page='.$I.'">'.$I.'</a>&nbsp;&nbsp;';
        }
    }
}