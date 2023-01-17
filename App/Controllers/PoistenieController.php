<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Poistenie;

class PoistenieController extends AControllerBase
{
    public function index(): Response
    {
        $insurance = Poistenie::getAll();
        return $this->html($insurance);
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function poistenie(): Response
    {
        return $this->html();
    }

    public function store() : Response {
        $nazov = $_REQUEST["nazov"];

        $poistenie = new Poistenie();
        $poistenie->setNazov($nazov);
        $poistenie->save();
        $output = true;
        return $this->json($output);
    }

    public function delete() {
        $id_poistenia = $this->request()->getValue('id');
        $poistenieToDelete = Poistenie::getOne($id_poistenia);
        if ($poistenieToDelete) {
            $poistenieToDelete->delete();
        }

        return $this->redirect("?c=poistenie");
    }

    /**
     * Check if nazov poistenia is already used
     * @return Response
     * @throws \Exception
     */
    public function insuranceExists() : Response {
        $nazov = $_REQUEST["poistenie"];
        $exists = Poistenie::getOneByNazov($nazov);
        $output = false;

        if($exists) {
            $output = true;
        }

        return $this->json($output);
    }
}