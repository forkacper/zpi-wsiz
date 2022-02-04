<?php

namespace App\Controller;

class PageController extends AbstractController
{
    public function dashboardAction() {
        $this->view->render('dashboard');
    }

    public function addNewOrderAction() {

        $result = $this->ordersModel->getDataForNewOrder($this->request->getUserId());
        $params = $result;

        if($this->request->hasPost()) {
            $orderParams = [
                'number' => $this->request->postParam('order_number'),
                'date_start' => $this->request->postParam('order_date_start'),
                'date_end' => $this->request->postParam('order_date_end'),
                'place' => $this->request->postParam('order_place'),
                'unloading' => $this->request->postParam('order_unloading'),
                'load' => $this->request->postParam('order_load'),
            ];

            $isError = false;

            foreach ($orderParams as $key => $value) {
                if(empty($value)) {
                    $params[] = ['error' => 'Nie wprowadzono jednego z parametrów!'];
                    $isError = true;
                }
            }

            if(!$isError) {
                $this->ordersModel->createOrder($orderParams, $this->request->getUserId());

                $params[] = [
                    'success' => 'Pomyślnie utworzono trasę!'
                ];
                    $this->view->render('pendingOrders', $params ?? []);
            }
        }
        $this->view->render('addNewOrder', $params ?? []);
    }

    public function pendingOrdersAction() {

        if($this->request->getParam('id')) {
            $this->ordersModel->deleteOrder($this->request->getParam('id'));

            $params[] = [
                'success' => 'Pomyślnie usunięto zamówienie!'
            ];
        }

        $params['user'] = $this->request->userInfo();
        $params['orders'] = $this->ordersModel->getPendingOrders();

        $this->view->render('pendingOrders', $params ?? []);
    }

    public function ordersInProgressAction() {
        $params['orders'] = $this->ordersModel->getInProgressOrders();

        $this->view->render('ordersInProgress', $params ?? []);
    }

    public function completedOrdersAction() {
        $params['orders'] = $this->ordersModel->getCompletedOrders();

        $this->view->render('completedOrders', $params ?? []);
    }

    public function routesAction() {
        $id = $this->request->getParam('id');
        if($id) {
            if($this->routesModel->deleteRoute($id)) {
                $params[] = [
                    'success' => 'Pomyślnie usunięto ładunek'
                ];
            }
        }

        $result = $this->routesModel->getRoutes($this->request->getUserId());

        $params[] = [
            'routes' => $result
        ];

        $this->view->render('routes', $params ?? []);
    }

    public function addRoutesAction() {
        if($this->request->hasPost()) {
            $addParams = [
                'country' => $this->request->postParam('routes_country'),
                'city' => $this->request->postParam('routes_city'),
                'postcode' => $this->request->postParam('routes_postcode'),
                'street' => $this->request->postParam('routes_street'),
                'number' => $this->request->postParam('routes_number'),
            ];

            if(empty($this->request->postParam('routes_country')) ||
                empty($this->request->postParam('routes_city')) ||
                    empty($this->request->postParam('routes_postcode')) ||
                        empty($this->request->postParam('routes_street')) ||
                            empty($this->request->postParam('routes_number'))
            ) $params[] = ['error' => 'Nie wprowadzono jednego z parametrów!'];
            else {
                $this->routesModel->createRoute($addParams, $this->request->getUserId());
                $params[] = [
                    'success' => 'Pomyślnie utworzono trasę!'
                ];
                $this->view->render('routes', $params ?? []);
            }
        }

        $this->view->render('addRoutes', $params ?? []);
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

        $result = $this->loadsModel->getLoads($this->request->getUserId());

        $params[] = [
            'loads' => $result
        ];

        $this->view->render('loads', $params ?? []);
    }

    public function addLoadsAction() {
        if($this->request->hasPost()) {
            $name = $this->request->postParam('loads_name');

            if(empty($name)) $params[] = ['error' => 'Wprowadź nazwę ładunku!'];
            else {
                $this->loadsModel->createLoad($name, $this->request->getUserId());
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