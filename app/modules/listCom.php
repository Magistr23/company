<?php
namespace App\Modules;

use App\Controllers\listCompany;

class listCom {
    public function listCountAll() {
        $list = new listCompany();
        return $list->list();
    }
    public function ListOne($idCompany) {
        $list = new listCompany();
        return $list->listCompanyOne($idCompany);
    }

    public function listAll($page, $per_page) {
        $list = new listCompany();
        return $list->listAll($page, $per_page);
    }
}