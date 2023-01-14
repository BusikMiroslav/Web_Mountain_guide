<?php

namespace App\Models;

use App\Core\Model;

class Rezervacia extends Model
{
    protected $id;
    protected $id_osoby;
    protected $id_vystupu;
    protected $id_poistenia;
    protected $id_vodcu;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdOsoby()
    {
        return $this->id_osoby;
    }

    /**
     * @param mixed $id_osoby
     */
    public function setIdOsoby($id_osoby): void
    {
        $this->id_osoby = $id_osoby;
    }

    /**
     * @return mixed
     */
    public function getIdVystupu()
    {
        return $this->id_vystupu;
    }

    /**
     * @param mixed $id_vystupu
     */
    public function setIdVystupu($id_vystupu): void
    {
        $this->id_vystupu = $id_vystupu;
    }

    /**
     * @return mixed
     */
    public function getIdPoistenia()
    {
        return $this->id_poistenia;
    }

    /**
     * @param mixed $id_poistenia
     */
    public function setIdPoistenia($id_poistenia): void
    {
        $this->id_poistenia = $id_poistenia;
    }

    /**
     * @return mixed
     */
    public function getIdVodcu()
    {
        return $this->id_vodcu;
    }

    /**
     * @param mixed $id_vodcu
     */
    public function setIdVodcu($id_vodcu): void
    {
        $this->id_vodcu = $id_vodcu;
    }
}