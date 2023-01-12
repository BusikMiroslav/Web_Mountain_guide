<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Vystup;

class VystupController extends AControllerBase
{

    public function index(): Response
    {
        $vystup = Vystup::getAll();
        return $this->html($vystup);
    }

    public function delete() {
        $id = $this->request()->getValue('id');
        $vystupToDelete = Vystup::getOne($id);
        if ($vystupToDelete) {
            $vystupToDelete->delete();
        }

        return $this->redirect("?c=vystup");
     }

    public function store() {
        $id = $this->request()->getValue('id');

        $vystup = ($id ? Vystup::getOne($id) : new Vystup());
        $vystup->setNazovVrcholu($this->request()->getValue('nazov_vrcholu'));
        $vystup->setCena(abs($this->request()->getValue('cena')));
        $vystup->setPopis($this->request()->getValue('popis'));
        if(isset($_FILES['img']) && $_FILES['img']['error'] == UPLOAD_ERR_OK) {
            $imgName = time() . "_" . $_FILES["img"]["name"];
            $imgPath = "C:\\xampp\\htdocs\\VAII_sem_praca\\public\\images" . DIRECTORY_SEPARATOR . $imgName;
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $imgPath)) {
                $vystup->setObrazok($imgName);
            }
        }

        $vystup->save();

        return $this->redirect("?c=vystup");
    }

    public function create() {
        return $this->html(new Vystup(), viewName: 'create.form');
    }


    public function edit() {
        $id = $this->request()->getValue('id');
        $vystupToEdit = Vystup::getOne($id);
        return $this->html($vystupToEdit, viewName: 'create.form');
    }
}