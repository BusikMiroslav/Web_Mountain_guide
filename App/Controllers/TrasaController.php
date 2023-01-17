<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Trasa;
use App\Models\Vystup;

class TrasaController extends AControllerBase
{

    public function index(): Response
    {
        $trasa = Trasa::getAll();
        return $this->html($trasa);
    }

    public function create() {
        $id = $this->request()->getValue('id');
        $vystup = Vystup::getOne($id);
        return $this->html($vystup, viewName: 'index');
    }

    public function store() {
        $id = $this->request()->getValue('id');

        $trasa = new Trasa();
        $trasa->setNazov($this->request()->getValue('nazov'));
        $trasa->setTypTrasy($this->request()->getValue('typ'));
        $trasa->setIdVystup($id);

        $trasa->save();

        return $this->redirect("?c=vystup");
    }

    public function delete() {
        $id_trasy = $this->request()->getValue('id');
        $trasaToDelete = Trasa::getOne($id_trasy);
        if ($trasaToDelete) {
            $trasaToDelete->delete();
        }

        return $this->redirect("?c=vystup");
    }

    /**
     * Check if nazov trasy is already used
     * @return Response
     * @throws \Exception
     */
    public function trasaExists() : Response {
        $nazov = $_REQUEST["tr"];
        $exists = Trasa::getOneByNazov($nazov);
        $output = false;

        if($exists) {
            $output = true;
        }

        return $this->json($output);
    }
}