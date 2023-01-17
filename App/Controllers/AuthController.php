<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Osoba;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();

        if(isset($formData['submit'])) {
            $osoba = Osoba::getOneByEmail($this->request()->getValue('email'));
            if(Osoba::getOneByEmail($this->request()->getValue('email')) != null) {
                if($this->request()->getValue('password') == $osoba->getHeslo()) {
                    $this->app->getAuth()->login($osoba->getEmail(), $osoba->getHeslo());
                    return $this->redirect("?c=home&a=cart");
                } else {
                    $data = ['message' => 'Nesprávne prihlasovacie údaje!'];
                    return $this->html($data);
                }
            }
        }
        return $this->html();
    }

    /**
     * Logout a user
     * @return \App\Core\Responses\ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect("?c=auth&a=login");
    }

    public function regist() {
        return $this->html(new Osoba(), viewName: 'registration');
    }

    public function update() {
        $id = $this->request()->getValue('id');
        $osobaEdit = Osoba::getOne($id);
        return $this->html($osobaEdit, viewName: 'update.profile');
    }

    public function registration(): Response
    {
        $id = $this->request()->getValue('id');
        if(Osoba::getOneByEmail($this->request()->getValue('email')) != null) {
            if(!$id || (Osoba::getOne($id)->getEmail() != Osoba::getOneByEmail($this->request()->getValue('email'))->getEmail() && Osoba::getOneByEmail($this->request()->getValue('email')) != null)) {
                return $this->redirect("?c=home&a=cart");
            }
        }

        $osoba = ($id ? Osoba::getOne($id) : new Osoba());
        $osoba->setMeno($this->request()->getValue('meno'));
        $osoba->setPriezvisko($this->request()->getValue('priezvisko'));
        $osoba->setTelefon($this->request()->getValue('telefon'));
        $osoba->setEmail($this->request()->getValue('email'));
        $osoba->setHeslo($this->request()->getValue('heslo'));

        $osoba->save();

        if ($id) {
            return $this->redirect("?c=home&a=cart");
        } else {
            return $this->redirect("?c=auth&a=login");
        }
    }

    /**
     * Zabudnuté heslo
     * @return \App\Core\Responses\ViewResponse
     */
    public function forgpassw() : Response
    {
        $formData = $this->app->getRequest()->getPost();
        $osoba = Osoba::getOneByEmail($this->request()->getValue('email'));
        if(isset($formData['submit'])) {
            if(Osoba::getOneByEmail($this->request()->getValue('email')) != null) {
                $osoba->setHeslo($this->request()->getValue('heslo'));
                $osoba->save();
                return $this->redirect("?c=auth&a=login");
            }
        }

        return $this->html();
    }

    /**
     * Check same password
     * @return Response
     * @throws \Exception
     */
    public function samePassword() : Response {
        $heslo = $_REQUEST["pass"];
        $id = explode("/", $heslo);
        $prve = $id[0];
        $druhe = $id[1];
        $output = false;

        if($prve === $druhe) {
            $output = true;
        }

        return $this->json($output);
    }

    /**
     * Check if email is already used
     * @return Response
     * @throws \Exception
     */
    public function emailExists() : Response {
        $email = $_REQUEST["mail"];

        $exists = Osoba::getOneByEmail($email);
        $output = false;

        if($exists) {
            $output = true;
        }

        return $this->json($output);
    }
}