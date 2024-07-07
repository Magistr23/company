<?php
namespace App\Controllers;

use App\Controllers\connect;
use PDO;

class listCompany extends connect 
{
    public function list() 
    {
        $sth = $this->conn->prepare("SELECT COUNT(*) AS quantity FROM `companys`");
        $sth->execute();
        $array = $sth->fetch(PDO::FETCH_ASSOC);
        return $array;
    }

    public function listAll($page, $per_page) 
    {
        $sth = $this->conn->prepare("SELECT * FROM `companys` LIMIT ".($page-1)*$per_page.", $per_page");
        $sth->execute();
        $array = $sth->fetchALL(PDO::FETCH_ASSOC);
        return $array;
    }
    public function listCompanyOne ($idCompany) 
    {
        $sth = $this->conn->prepare("SELECT * FROM `companys` WHERE id=:id LIMIT 1");
        $sth->bindParam(":id", $idCompany);
        $sth->execute();
        $array = $sth->fetch(PDO::FETCH_ASSOC);
        return $array;
    }
}