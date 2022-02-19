<?php

declare(strict_types=1);

namespace App;

class Request
{
    private array $get = [];
    private array $post = [];
    private array $server = [];
    private array $session = [];

    public function __construct(array $get, array $post, array $server, array $session)
    {
        $this->get = $get;
        $this->post = $post;
        $this->server = $server;
        $this->session = $session;
    }

    public function userInfo(): array {
        return [
          'userId' => (int)$this->session['userId'],
          'userName' => (string)$this->session['userName'],
          'userFullName' => (string)$this->session['userFullName'],
          'userRole' => $this->session['userRole']
        ];
    }

    public function getUserId(): int {
        return (int)$this->userInfo()['userId'];
    }

    public function isAuthenticated(): bool
    {
       return $this->session['authenticated'] ?? false;
    }

    public function isPost(): bool
    {
        return $this->server['REQUEST_METHOD'] === 'POST';
    }

    public function isGet(): bool
    {
        return $this->server['REQUEST_METHOD'] === 'GET';
    }

    public function hasPost(): bool
    {
        return !empty($this->post);
    }

    public function getSessionParams():array
    {
        return $this->session;
    }

    public function getParam(string $name, $default = null):?string
    {
        return $this->get[$name] ?? $default;
    }

    public function postParam(string $name, $default = null):?string
    {
        return $this->post[$name] ?? $default;
    }
}
