<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Osoba;
use App\Models\Poistenie;
use App\Models\Vystup;
use App\Models\Rezervacia;


class RezervaciaController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html();
    }

    /**
     * Example of an action accessible without authorization
     * @return \App\Core\Responses\ViewResponse
     */
    public function rezervacia(): Response
    {
        return $this->html();
    }

    public function show(): Response
    {
        $id = $this->request()->getValue('id');
        $vystupToEdit = Vystup::getOne($id);
        return $this->html($vystupToEdit, viewName: 'index');
    }

    public function store() {
        $rezervacia_all = Rezervacia::getAll();
        $existuje = 0;
        foreach ($rezervacia_all as $rez) {
            if ($rez->getIdOsoby() == $this->request()->getValue('user') && $rez->getIdVystupu() == $this->request()->getValue('id')) {
                $existuje = 1;
            }
        }


        if ($existuje == 0) {
            $rezervacia = new Rezervacia();

            $rezervacia->setIdOsoby($this->request()->getValue('user'));
            $rezervacia->setIdVystupu($this->request()->getValue('id'));


            if(isset($_POST['submit'])){
                if(!empty($_POST['Poistenie'])) {
                    $selected = $_POST['Poistenie'];
                    $rezervacia->setIdPoistenia($selected);
                }
            }

            if(isset($_POST['submit'])){
                if(!empty($_POST['Vodca'])) {
                    $selected = $_POST['Vodca'];
                    $rezervacia->setIdVodcu($selected);
                }
            }

            $rezervacia->save();

            return $this->redirect("?c=vystup");
        } else {
            return $this->redirect("?c=vystup");
        }
    }

    public function delete() {
        $id = $this->request()->getValue('id');
        $rezervaciaToDelete = Rezervacia::getOne($id);
        if ($rezervaciaToDelete) {
            $rezervaciaToDelete->delete();
        }

        return $this->redirect("?c=home&a=cart");

    }
}