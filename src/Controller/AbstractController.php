<?php

namespace App\Controller;

use App\Model\LoginModel;
use App\Model\LoadsModel;
use App\Model\RoutesModel;
use App\Model\OrdersModel;
use App\Model\DriversModel;
use App\Model\CarsModel;
use App\Model\ContractorsModel;
use App\Request;
use App\View;

abstract class AbstractController
{

    protected const DEFAULT_ACTION = 'dashboard';

    private static array $configuration = [];

    protected Request $request;
    protected View $view;
    protected LoginModel $loginModel;
    protected LoadsModel $loadsModel;
    protected RoutesModel $routesModel;
    protected OrdersModel $ordersModel;
    protected DriversModel $driversModel;
    protected CarsModel $carsModel;
    protected ContractorsModel $contractorsModel;

    public static function initConfiguration(array $configuration): void
    {
        self::$configuration = $configuration;
    }

    public function __construct(Request $request)
    {
        if (empty(self::$configuration['db'])) {
            // error to do
        }

        $this->loginModel = new LoginModel(self::$configuration['db']);
        $this->loadsModel = new LoadsModel(self::$configuration['db']);
        $this->routesModel = new RoutesModel(self::$configuration['db']);
        $this->ordersModel = new OrdersModel(self::$configuration['db']);
        $this->driversModel = new DriversModel(self::$configuration['db']);
        $this->carsModel = new CarsModel(self::$configuration['db']);
        $this->contractorsModel = new ContractorsModel(self::$configuration['db']);

        $this->request = $request;
        $this->view = new View();
    }

    final public function run(): void
    {
        $action = $this->action() . 'Action';
        if (!method_exists($this, $action)) {
            $action = self::DEFAULT_ACTION . 'Action';
        }
            $this->$action();
    }

    final protected function redirect(string $to, array $params): void
    {
        $location = $to;

        if (count($params)) {
            $queryParams = [];
            foreach ($params as $key => $value) {
                $queryParams[] = urlencode($key) . '=' . urlencode($value);
            }
            $queryParams = implode('&', $queryParams);
            $location .= '?' . $queryParams;
        }

        header("Location: $location");
        exit;
    }

    final private function action(): string
    {
        return $this->request->getParam('action', self::DEFAULT_ACTION);
    }
}