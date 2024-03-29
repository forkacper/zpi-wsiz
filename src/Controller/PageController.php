<?php

namespace App\Controller;

class PageController extends AbstractController
{
    public function dashboardAction() {
        $this->view->render('dashboard');
    }

    public function chatAction() {
        $this->view->render('chat');
    }

    public function addContractorAction() {
        if($this->request->hasPost()) {
            $addParams = [
              'firstname' => $this->request->postParam('contractor_firstname'),
              'lastname' => $this->request->postParam('contractor_lastname'),
                'password' => $this->request->postParam('contractor_password'),
                'login' => $this->request->postParam('contractor_login')
            ];
            $this->contractorsModel->addContractor($addParams);

            $params[] = ['success' => 'Pomyślnie dodano kontrahenta !'];
        }

        $this->view->render('addContractor', $params ?? []);
    }

    public function contractorsAction() {
        if($this->request->getParam('id')) {
            $this->contractorsModel->deleteContractor($this->request->getParam('id'));
            $params[] = ['success' => 'Pomyślnie usunięto kontrahenta !'];
        }

        $params['contractors'] = $this->contractorsModel->getContractors();

        $this->view->render('contractors', $params ?? []);
    }

    public function addCarAction() {
        if($this->request->hasPost()) {
            $paramsToAddCar = [
                'brand' => $this->request->postParam('car_brand'),
                'model' => $this->request->postParam('car_model'),
                'plate' => $this->request->postParam('car_plate'),
            ];
            $this->carsModel->addCar($paramsToAddCar);
            $params[] = ['success' => 'Pomyślnie dodano auto!'];
        }

        $this->view->render('addCar', $params ?? []);
    }

    public function vehiclesAction() {

        if($this->request->getParam('id')) {
            $this->carsModel->deleteCar($this->request->getParam('id'));

            $params[] = ['success' => 'Pomyślnie usunięto auto!'];
        }

        $params['cars'] = $this->carsModel->getCars();
        $this->view->render('vehicles', $params ?? []);
    }

    public function addDriverAction() {

        if($this->request->hasPost()) {
            $addDriverParams = [
                'firstname' => $this->request->postParam('drivers_firstname'),
                'lastname' => $this->request->postParam('drivers_lastname'),
                'login' => $this->request->postParam('drivers_login'),
                'password' => md5($this->request->postParam('drivers_password')),
                'car' => (int)$this->request->postParam('drivers_car'),
            ];

            $this->driversModel->createDriver($addDriverParams);

            $params[] = ['success' => 'Pomyślnie utworzono kierowce!'];
        }

        $params['cars'] = $this->driversModel->getCars();

        $this->view->render('addDriver', $params ?? []);
    }

    public function editDriverAction() {

        if($this->request->hasPost()) {
            $editParams = [
                'newCar' => $this->request->postParam('driver_car'),
                'userId' => $this->request->getParam('id')
            ];

            $this->driversModel->updateDriver($editParams);

            $params[] = ['success' => 'Pomyślnie edytowano kierowce!'];
        }

        $params['driver'] = $this->driversModel->getDriverById((int)$this->request->getParam('id'));
        $this->view->render('editDriver', $params ?? []);
    }

    public function driversAction() {
        if($this->request->getParam('id')) {
            $this->driversModel->deleteDriver($this->request->getParam('id'));
            $params[] = [
                'success' => 'Pomyślnie usunięto użytkownika!'
            ];
        }

        $params['drivers'] = $this->driversModel->getDrivers();

        $this->view->render('drivers', $params ?? []);
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
                    'success' => 'Pomyślnie utworzono zlecenie!'
                ];
            }
        }
        $this->view->render('addNewOrder', $params ?? []);
    }

    public function editOrderAction() {
        if($this->request->hasPost()) {
            if(!empty($this->request->postParam('order_driver'))) {
                $this->ordersModel->editOrder($this->request->getParam('id'), $this->request->postParam('order_driver'));
            }
            if(!empty($this->request->postParam('order_status'))) {
                $this->ordersModel->editOrder($this->request->getParam('id'), 0, $this->request->postParam('order_status'));
            }

            $params[] = [
                'success' => 'Pomyślnie edytowno zamówienie!'
            ];
        }


        if($this->request->getParam('id')) {
            $params['user'] = $this->request->userInfo();
            $params['orders'] = $this->ordersModel->getOrderById($this->request->getParam('id'));
            $params['drivers'] = $this->ordersModel->getDriversToOrder();
            $params['statuses'] = $this->ordersModel->getStatusesToOrder($this->request->getParam('id'));

            $this->view->render('editOrder', $params ?? []);
        }
    }

    public function pendingOrdersAction() {

        if($this->request->getParam('id')) {
            $this->ordersModel->deleteOrder($this->request->getParam('id'));

            $params[] = [
                'success' => 'Pomyślnie usunięto zamówienie!'
            ];
        }

        $params['user'] = $this->request->userInfo();
        $params['orders'] = $this->ordersModel->getPendingOrders($params['user']['userRole'], $params['user']['userId']);

        $this->view->render('pendingOrders', $params ?? []);
    }

    public function ordersInProgressAction() {
        $params['user'] = $this->request->userInfo();
        $params['orders'] = $this->ordersModel->getInProgressOrders($params['user']['userRole'], $params['user']['userId']);

        $this->view->render('ordersInProgress', $params ?? []);
    }

    public function completedOrdersAction() {
        $params['user'] = $this->request->userInfo();
        $params['orders'] = $this->ordersModel->getCompletedOrders($params['user']['userRole'], $params['user']['userId']);

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