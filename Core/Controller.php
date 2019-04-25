<?php

class Controller
{
    public function __construct()
    {
    }

    var $vars = [];

    function set($data)
    {
        $this->vars = array_merge($this->vars, $data);
    }

    function load_view($filename)
    {
        extract($this->vars);
        require("../Views/" . $filename . '.php');
    }

    private function secure_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    protected function secure_form($form)
    {
        foreach ($form as $key => $value) {
            $form[$key] = $this->secure_input($value);
        }
    }

}

?>