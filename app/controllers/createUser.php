<?php
namespace App\Controllers;
use PDOException;


class createUser extends connect {

    // protected $conn;
    protected $table_name = 'users';

    public $fio;
    public $password;
    public $role = 0;
    public $id;
    public function CreateUse($fio,$pass)
    {
        try {
            $statement = $this->conn->prepare("INSERT INTO ".$this->table_name. " SET fio=:fio, password=:password, role=:role");
            $statement->bindParam(":fio", $fio);
            $statement->bindParam(":password", $pass);
            $statement->bindParam(":role", $this->role);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
}