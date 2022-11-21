<?php

namespace App\Models;

use App\Core\Model;

class Osoba extends Model
{
    protected $id;
    protected $meno = "";
    protected $priezvisko;
    protected $telefon;
    protected $email;
    protected $heslo;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id_osoby
     */
    public function setId($id): void
    {
        $this->id = $id;
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

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getHeslo()
    {
        return $this->heslo;
    }

    /**
     * @param mixed $heslo
     */
    public function setHeslo($heslo): void
    {
        $this->heslo = $heslo;
    }
}