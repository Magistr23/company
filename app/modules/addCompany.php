<?php 
namespace App\Modules;
use App\Controllers\CreateCompany;

class AddCompany {
    public function createCompany($title, $file, $desc) 
    {
        $titleCompany = htmlspecialchars(strip_tags($title));
        $logo = htmlspecialchars(strip_tags($file));
        $description = htmlspecialchars(strip_tags($desc));

        $create = new CreateCompany();
        $create->addCreateCompany($titleCompany, $logo, $description);
    }

    public function delCompanys($id) 
    {
        $idCompany = htmlspecialchars(strip_tags($id));

        $del = new CreateCompany();
        $del->delCompany($idCompany);
    }

    public function editCompanys($title, $description, $id_company) 
    {
        $titleCompany = htmlspecialchars(strip_tags($title));
        $descriptionCompany = htmlspecialchars(strip_tags($description));
        $idCompany = htmlspecialchars(strip_tags($id_company));

        $edit = new CreateCompany();
        $edit->editCompany($titleCompany, $descriptionCompany, $idCompany);
        
    }
}