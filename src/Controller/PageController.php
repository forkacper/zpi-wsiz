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

    public function pendingOrders() {
        $this->view->render('pendingOrders');
    }

    public function ordersInProgress() {
        $this->view->render('ordersInProgress');
    }

}