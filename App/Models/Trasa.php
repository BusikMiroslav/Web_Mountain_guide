<?php

namespace App\Models;

use App\Core\Model;

class Trasa extends Model
{
    protected $id;
    protected $nazov;
    protected $typ_trasy;
    protected $id_vystup;

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
    public function getNazov()
    {
        return $this->nazov;
    }

    /**
     * @param mixed $nazov
     */
    public function setNazov($nazov): void
    {
        $this->nazov = $nazov;
    }

    /**
     * @return mixed
     */
    public function getTypTrasy()
    {
        return $this->typ_trasy;
    }

    /**
     * @param mixed $typ_trasy
     */
    public function setTypTrasy($typ_trasy): void
    {
        $this->typ_trasy = $typ_trasy;
    }

    /**
     * @return mixed
     */
    public function getIdVystup()
    {
        return $this->id_vystup;
    }

    /**
     * @param mixed $id_vystup
     */
    public function setIdVystup($id_vystup): void
    {
        $this->id_vystup = $id_vystup;
    }


}