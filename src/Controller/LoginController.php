<?php

namespace App\Controller;

class LoginController extends AbstractController
{
    public function loginAction() {
        $this->view->render('login');
    }
}