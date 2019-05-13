<?php

class Dispatcher {
    private $request;

    public function dispatch() {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);

        $controller = $this->loadController();

        if(!method_exists($controller, $this->request->action)) {
            include '../Views/error_404.php';
            exit;
        }

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController() {
        $name = $this->request->controller . "Controller";
        $file = 'Controllers/' . $name . '.php';

        require($file);
        $controller = new $name();
        return $controller;

    }

}

?>