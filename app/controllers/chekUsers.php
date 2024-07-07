<?php
namespace App\Controllers;
use App\Controllers\connect;
use PDO;
use PDOException;

class chekUsers extends connect 
{
    protected $table_name = 'users';
    public function chekUser($fio,$pass) 
    {
        try {
            $statement = $this->conn->prepare("SELECT * FROM ".$this->table_name. " WHERE fio=:fio LIMIT 1");
            $statement->bindParam(":fio", $fio);
            $statement->execute();
            $user = $statement->fetch(PDO::FETCH_ASSOC);
            if (!empty($user)) {
                if ($fio == $user['fio']) {
                   if (password_verify($pass, $user['password'])) {
                       if ($user['role'] > 0) {
                           $_SESSION['admin'] = ['login' => $user['fio']];
                           $_SESSION['admin'] = ['id' => $user['id']];
                           $_SESSION['admin'] = ['role' => $user['role']];
                           header('location: /admin');
                       } else {
                            $_SESSION['user'] = ["login" => $_POST['nicname']];
                            $_SESSION['user'] = ["id" => $user['id']];
                            header('location: /');
                       }
                   }
                }
            } else {
                $_SESSION['message'] = 'Логин или пароль не правильный';
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}