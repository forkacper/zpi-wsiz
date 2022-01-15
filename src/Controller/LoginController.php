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
                $user = $this->loginModel->getUser($username, $password);
                if(empty($user)) {
                    $params[] = [
                        'error' => 'Nieprawidłowa nazwa użytkownika lub hasło. Spróbuj jeszcze raz!'
                    ];
                } else {
                    $_SESSION['authenticated'] = true;
                    $_SESSION['userName'] = $user[0]['username'];
                    $_SESSION['profile'] = $user[0]['role'];
                    $params[] = [
                        'success' => 'Pomyślnie zalogowano użytkownika!'
                    ];
                    $this->view->render('dashboard', $params ?? []);
                }
            }
        }

        $this->view->render('login', $params ?? []);
    }
}