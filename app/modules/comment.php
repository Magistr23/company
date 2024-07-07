<?php
namespace App\Modules;
use App\Controllers\CommentCompany;

class Comment
{
    public function createComment($fio, $file, $comment, $id_company)
    {
        $titleCompany = htmlspecialchars(strip_tags($fio));
        $logo = htmlspecialchars(strip_tags($file));
        $description = htmlspecialchars(strip_tags($comment));
        $companyId = $id_company;

        $createComment = new CommentCompany();
        $createComment->addComment($titleCompany,$logo,$description,$companyId);

    }

    public function listCommentALL($id_company) 
    {
        $idCompany = htmlspecialchars(strip_tags($id_company));

        $list = new CommentCompany();
        return $list->listCommentAll($idCompany);
    }

    public function listCommentOne($id_comment) 
    {
        // $idCompany = htmlspecialchars(strip_tags($id_company));
        $idComment = htmlspecialchars(strip_tags($id_comment));

        $list = new CommentCompany();
        return $list->listCommentOne($idComment);
    }

    public function updateComment($fio,$comment,$id_comment) 
    {
        $fioComment = htmlspecialchars(strip_tags($fio));
        $description = htmlspecialchars(strip_tags($comment));
        $id = htmlspecialchars(strip_tags($id_comment));

        $list = new CommentCompany();
        $list->updateComment($fioComment,$description,$id);
    }

    public function delPhoto($id_comment) 
    {
        $photo = '';
        $id = htmlspecialchars(strip_tags($id_comment));

        $list = new CommentCompany();
        $list->delPhoto($photo,$id);

    }
    
    public function commentALL($companysId) 
    {
        $id = htmlspecialchars(strip_tags($companysId));
        $list = new CommentCompany();
        return $list->commentAll($id);
    }

    public function commentApprove($id_comment) 
    {
        $idComment = htmlspecialchars(strip_tags($id_comment));
        $list = new CommentCompany();
        return $list->commentApprove($idComment);
    }
}