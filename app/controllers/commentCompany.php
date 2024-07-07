<?php

namespace App\Controllers;

use App\Controllers\connect;
use PDOException;
use PDO;

class CommentCompany extends connect 
{
    public function addComment($fio, $file, $comment, $id_company)
    {
        try {
            $statement = $this->conn->prepare("INSERT INTO reviews SET fio=:fio, photo=:photo, comment=:comment, confirm='0', id_company=:id_company");
            $statement->bindParam(":fio", $fio);
            $statement->bindParam(":photo", $file);
            $statement->bindParam(":comment", $comment);
            $statement->bindParam(":id_company", $id_company);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function listCommentAll($companysId)
    {
        try {
            $statement = $this->conn->prepare('SELECT reviews.fio,reviews.photo,reviews.comment,reviews.id,companys.id AS comid FROM `reviews`, `companys` WHERE id_company = :comid AND confirm = "1" AND companys.id = :idcom');
            $statement->bindParam(":comid", $companysId);
            $statement->bindParam(":idcom", $companysId);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function listCommentOne($commentid)
    {
        try {
            $statement = $this->conn->prepare('SELECT * FROM reviews WHERE id=:id LIMIT 1');
            $statement->bindParam(":id", $commentid);
            // $statement->bindParam(":id_company", $companysId);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateComment($fio, $comment,$id_comment)
    {
        try {
            $statement = $this->conn->prepare('UPDATE reviews SET fio=:fio, comment=:comment WHERE id=:id');
            $statement->bindParam(":fio", $fio);
            $statement->bindParam(":comment", $comment);
            $statement->bindParam(":id", $id_comment);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delPhoto($photo, $id_comment)
    {
        try {
            $statement = $this->conn->prepare('UPDATE reviews SET photo=:photo WHERE id=:id');
            $statement->bindParam(":photo", $photo);
            $statement->bindParam(":id", $id_comment);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function commentAll($companysId)
    {
        try {
            $statement = $this->conn->prepare('SELECT reviews.fio,reviews.photo,reviews.comment,reviews.id,companys.id AS comid FROM `reviews`, `companys` WHERE id_company = :comid AND confirm = "0" AND companys.id = :idcom');
            $statement->bindParam(":comid", $companysId);
            $statement->bindParam(":idcom", $companysId);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function commentApprove($id)
    {
        try {
            $statement = $this->conn->prepare('UPDATE reviews SET confirm="1" WHERE id=:id');
            $statement->bindParam(":id", $id);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}