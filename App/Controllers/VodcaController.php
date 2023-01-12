<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Vodca;

class VodcaController extends AControllerBase
{
    public function index(): Response
    {
        $vodca = Vodca::getAll();
        return $this->html($vodca);
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function vodca(): Response
    {
        return $this->html();
    }

    public function store() {
        $id = $this->request()->getValue('id');

        $vodca = ($id ? Vodca::getOne($id) : new Vodca());
        $vodca->setMeno($this->request()->getValue('meno'));
        $vodca->setPriezvisko($this->request()->getValue('priezvisko'));
        $vodca->setTelefon($this->request()->getValue('telefon'));
        $vodca->setVek($this->request()->getValue('vek'));

        $vodca->save();

        return $this->redirect("?c=vodca");
    }

    public function delete() {
        $id = $this->request()->getValue('id');
        $vodcaToDelete = Vodca::getOne($id);
        if ($vodcaToDelete) {
            $vodcaToDelete->delete();
        }

        return $this->redirect("?c=vodca");
    }

    public function edit() {
        $id = $this->request()->getValue('id');
        $vodcaToEdit = Vodca::getOne($id);
        return $this->html($vodcaToEdit, viewName: 'update');
    }
}