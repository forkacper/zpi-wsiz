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
        $this->view->render('routes');
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