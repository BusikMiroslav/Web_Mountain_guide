<?php

namespace App\Models;

use App\Core\Model;

class Osoba extends Model
{
    protected $id_osoby;
    protected $meno;
    protected $priezvisko;
    protected $telefon;

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
    public function getMeno()
    {
        return $this->meno;
    }

    /**
     * @param mixed $meno
     */
    public function setMeno($meno): void
    {
        $this->meno = $meno;
    }

    /**
     * @return mixed
     */
    public function getPriezvisko()
    {
        return $this->priezvisko;
    }

    /**
     * @param mixed $priezvisko
     */
    public function setPriezvisko($priezvisko): void
    {
        $this->priezvisko = $priezvisko;
    }

    /**
     * @return mixed
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * @param mixed $telefon
     */
    public function setTelefon($telefon): void
    {
        $this->telefon = $telefon;
    }



}