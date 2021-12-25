<?php

declare(strict_types=1);

namespace App;

use PDO;

require_once("src/View.php");
require_once("src/Database.php");

class Controller
{
    private const DEFAULT_ACTION = 'dashboard';

    private static array $configuration = [];

    private array $request;
    private View $view;

    public static function initConfiguration(array $configuration):void {
        self::$configuration = $configuration;
    }

    public function __construct(array $request)
    {
        $db = new Database(self::$configuration);

        $this->request = $request;
        $this->view = new View();
    }

    public function run(): void
    {
        $viewParams = [];
        $page = $this->getPage();

        switch ($page) {
            case 'page':
                $page = "page";
                break;
            default:
                $page = $page;
                break;
        }

        $this->view->render($page, $viewParams);
    }

    private function action(): string
    {
        $data = $this->getRequestGet();
        return $data['action'] ?? self::DEFAULT_ACTION;
    }

    private function getPage(): string
    {
        $data = $this->getRequestGet();
        return $data['page'] ?? self::DEFAULT_ACTION;
    }

    private function getRequestGet(): array
    {
        return $this->request['get'] ?? [];
    }

    private function getRequestPost(): array
    {
        return $this->request['post'] ?? [];
    }
}
