<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Osoba;
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
        if(Vodca::getOneByTelefon($this->request()->getValue('telefon')) != null) {
            if(!$id || (Vodca::getOne($id)->getTelefon() != Vodca::getOneByTelefon($this->request()->getValue('telefon'))->getTelefon() && Vodca::getOneByTelefon($this->request()->getValue('telefon')) != null)) {
                return $this->redirect("?c=vodca");
            }
        }

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

    /**
     * Check if telefon is already used
     * @return Response
     * @throws \Exception
     */
    public function numberExists() : Response {
        $telefon = $_REQUEST["telefon"];
        $exists = Vodca::getOneByTelefon($telefon);
        $output = false;

        if($exists) {
            $output = true;
        }

        return $this->json($output);
    }
}