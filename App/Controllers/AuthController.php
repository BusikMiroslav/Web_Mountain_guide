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
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect('?c=admin');
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return \App\Core\Responses\ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->html();
    }

    public function regist() {
        return $this->html(new Osoba(), viewName: 'registration');
    }


    public function registration(): Response
    {
        //$id = $this->request()->getValue('id');
        if(Osoba::getOneByEmail($this->request()->getValue('email')) != null) {
            echo '<script>alert("Email už existuje!")</script>';
            return $this->html(viewName: 'registration');
        } else {
            $osoba = new Osoba();
            $osoba->setMeno($this->request()->getValue('meno'));
            $osoba->setPriezvisko($this->request()->getValue('priezvisko'));
            $osoba->setTelefon($this->request()->getValue('telefon'));
            $osoba->setEmail($this->request()->getValue('email'));
            $osoba->setHeslo($this->request()->getValue('heslo'));

            $osoba->save();

            return $this->redirect("?c=auth&a=login");
        }
    }

    /**
     * Zabudnuté heslo
     * @return \App\Core\Responses\ViewResponse
     */
    public function forgpassw() : Response
    {
        return $this->html();
    }
}