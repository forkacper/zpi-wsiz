<?php

namespace App\Controller;

use App\Model\LoginModel;
use App\Model\LoadsModel;
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

    final private function action(): string
    {
        return $this->request->getParam('action', self::DEFAULT_ACTION);
    }
}