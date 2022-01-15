<?php

namespace App\Controller;

class LoginController extends AbstractController
{
    public function loginAction() {

        if($this->request->hasPost()) {

            $username = $this->request->postParam('username');
            $password = $this->request->postParam('password');

            if(empty($username)) {
                $params[] = [
                    'error' => 'Wprowadź login użytkownika'
                ];
            }
            else if(empty($password)) {
                $params[] = [
                    'error' => 'Wprowadź hasło użytkownika'
                ];
            }
            else {
                $validateUser = $this->loginModel->getUser($username, $password);
                if(!$validateUser) {
                    $params[] = [
                        'error' => 'Nieprawidłowa nazwa użytkownika lub hasło. Spróbuj jeszcze raz!'
                    ];
                } else {
                    $params[] = [
                        'success' => 'Pomyślnie zalogowano'
                    ];
                    $this->view->render('dashboard', $params ?? []);
                }
            }
        }

        $this->view->render('login', $params ?? []);
    }
}