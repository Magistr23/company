<?php
use App\Modules\Comment;

$list = new Comment();
$commentAll = $list->listCommentOne($_GET['comment']);

if(isset($_POST['edit'])) {
    $list->updateComment($_POST['fio'],$_POST['comment'],$_POST['id_comment']);
} elseif (isset($_POST['del_photo'])) {
    $list->delPhoto($_POST['id_comment']);
} elseif (isset($_POST['approve'])) {
    $list->commentApprove($_GET['comment']);
}

echo "<div class='comment_company main'>";
if(isset($_SESSION['admin']['role']) && $_SESSION['admin']['role'] == 1) {
    ?>
    
    <form action="" method="POST" class="edit_form">
        <input type="hidden" name="id_comment" value="<?=$_GET['comment']?>">
        <input type="submit" name="del_comment" value="Удалить полностью">
        <input type="submit" name="del_photo" value="Удалить фотографию">
        <input type="submit" name="edit" value="Редактировать">
        <?php 
        if($commentAll['confirm'] == 0){
            echo '<input type="submit" name="approve" value="Одобрить">';
        }
        ?>
        <div class="comment_company-title">
            <h2>Коментарий от <input type="text" name="fio" value="<?= $commentAll['fio']?>"></h2>
            <div class="comment_company-text">
                <textarea name="comment"><?=$commentAll['comment']?></textarea>
            </div>
            <div class="comment_company-img">
                <img src="<?=$commentAll['photo']?>" alt="">
            </div>
        </div>
    </form>
    <?php
    } else {
    ?>
    <div class="comment_company-title">
        <h2>Коментарий от <?= $commentAll['fio']?></h2>
        <div class="comment_company-text">
            <?=$commentAll['comment']?>
        </div>
        <div class="comment_company-img">
            <img src="<?=$commentAll['photo']?>" alt="">
        </div>
    </div>

    <?php
    }

echo "</div>";