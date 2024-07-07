<?php

namespace App\Modules;

use App\Controllers\chekUsers;
use App\Controllers\createUser;


class User {
    public function userCreate($fio, $password) {
        $login = htmlspecialchars(strip_tags($fio));
        $pass = password_hash($password, PASSWORD_DEFAULT);

        $createUser = new createUser();
        $createUser->CreateUse($login,$pass);
    }

    public function chek($fio, $password) {
        $login = htmlspecialchars(strip_tags($fio));

        $chek = new chekUsers();
        $chek->chekUser($login,$password);
    }
}