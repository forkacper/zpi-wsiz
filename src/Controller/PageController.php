<?php

namespace App\Controller;

class PageController extends AbstractController
{
    public function dashboardAction() {
        $this->view->render('dashboard');
    }

    public function addNewOrderAction() {
        $this->view->render('addNewOrder');
    }

    public function pendingOrdersAction() {
        $this->view->render('pendingOrders');
    }

    public function routesAction() {
        $userInfo = $this->request->userInfo();

        $result = $this->loadsModel->getLoads($userInfo['userId']);

        $this->view->render('routes');
    }

    public function loadsAction() {
        $id = $this->request->getParam('id');
        if($id) {
            if($this->loadsModel->deleteLoad($id)) {
                $params[] = [
                    'success' => 'Pomyślnie usunięto ładunek'
                ];
            }
        }

        $userInfo = $this->request->userInfo();
        $result = $this->loadsModel->getLoads($userInfo['userId']);

        $params[] = [
            'loads' => $result
        ];

        $this->view->render('loads', $params ?? []);
    }

    public function addLoadsAction() {
        if($this->request->hasPost()) {
            $userInfo = $this->request->userInfo();
            $name = $this->request->postParam('loads_name');

            if(empty($name)) $params[] = ['error' => 'Wprowadź nazwę ładunku!'];
            else {
                $this->loadsModel->createLoad($name, $userInfo['userId']);
                $params[] = [
                    'success' => 'Pomyślnie utworzono ładunek!'
                ];
                $this->view->render('loads', $params ?? []);
            }
        }
        $this->view->render('addLoads', $params ?? []);
    }

    public function logoutAction() {
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
        $params[] = [
            'success' => 'Pomyślnie wylogowano użytkownika'
        ];
        $this->view->render('login', $params);
    }
}