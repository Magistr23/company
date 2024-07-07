<?php 
namespace App\Controllers;

use PDO;
use PDOException;

class connect {
    private $host = 'localhost';
    private $bd_name = 'company';
    private $username = 'root';
    private $password = 'root';
    public $conn;

    public function __construct()
    {

        try {
            $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->bd_name.";charset=utf8" , $this->username, $this->password);
        }catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
    }
}