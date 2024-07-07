<?php

namespace App\Controllers;

use App\Controllers\connect;
use PDOException;

class CreateCompany extends connect
{
    public function addCreateCompany($title, $file, $desc)
    {
        try {
            $statement = $this->conn->prepare("INSERT INTO companys SET title=:title,logo=:logo,description=:description");
            $statement->bindParam(":title", $title);
            $statement->bindParam(":logo", $file);
            $statement->bindParam(":description", $desc);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delCompany($id)
    {
        try {
            $statement = $this->conn->prepare("DELETE FROM companys WHERE id=:id");
            $statement->bindParam(":id", $id);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function editCompany($title, $description, $id_company)
    {
        try {
            $statement = $this->conn->prepare("UPDATE companys SET title=:title, description=:description WHERE id=:id");
            $statement->bindParam(":title", $title);
            $statement->bindParam(":description", $description);
            $statement->bindParam(":id", $id_company);
            $statement->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}