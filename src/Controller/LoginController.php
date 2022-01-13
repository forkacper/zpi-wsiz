<?php

namespace App\Controller;

class LoginController extends AbstractController
{
    public function loginAction() {

        if($this->request->hasPost()) {
            $loginData = [
                'username' => $this->request->postParam('username'),
                'password' => $this->request->postParam('password')
            ];

        }

        $this->view->render('login');
    }
}