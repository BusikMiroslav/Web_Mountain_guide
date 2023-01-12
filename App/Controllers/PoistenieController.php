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

    public function store() {
        $poistenie = new Poistenie();
        $poistenie->setNazov($this->request()->getValue('nazov'));

        $poistenie->save();

        return $this->redirect("?c=poistenie");
    }

    public function delete() {
        $id = $this->request()->getValue('id');
        $poistenieToDelete = Poistenie::getOne($id);
        if ($poistenieToDelete) {
            $poistenieToDelete->delete();
        }

        return $this->redirect("?c=poistenie");
    }
}