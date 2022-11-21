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