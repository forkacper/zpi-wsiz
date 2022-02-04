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
                    $_SESSION['userId'] = $user[0]['id'];
                    $_SESSION['userName'] = $user[0]['username'];
                    $_SESSION['userFullName'] = $user[0]['firstname'] . ' ' .$user[0]['lastname'];
                    $_SESSION['userRole'] = $user[0]['name'];
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