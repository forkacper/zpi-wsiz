<?php

namespace App\Controller;

class LoginController extends AbstractController
{
    public function loginAction() {

        if($this->request->hasPost()) {

            $username = $this->request->postParam('username');
            $password = $this->request->postParam('password');

            var_dump($_POST);

            if(empty($username)) {
                $params = [
                    'error' => 'Wprowadź login użytwkonika'
                ];
            }
            if(empty($password)) {
                $params = [
                    'error' => 'Wprowadź hasło użytwkonika'
                ];
            }

            $loginData = [
                'username' => $username,
                'password' => $password
            ];


        }

        $this->view->render('login', $params ?? []);
    }
}