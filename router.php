<?php

class Router
{

    static public function parse($url, $request)
    {
        //www.voorbeeld.nl/controller/action/parameter
        $url = trim($url);

        //Default naar homepage wanneer geen extentie.
        if ($url == "/") {
            $request->controller = "home";
            $request->action = "index";
            $request->params = [];
        } else {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 1);

            //Als er een extentie is wordt er gekeken of deze bestaat. Anders 404 (mogelijk eigen controller?).
            if (file_exists('../Controllers/' . $explode_url[0] . 'Controller.php')) {
                $request->controller = $explode_url[0];
                //links zonder tweede verwijzing gaan automatisch naar index.
                $request->action = (empty($explode_url[1]) ? "index" : $explode_url[1]);
                $request->params = array_slice($explode_url, 2);
            } else {
                include '../Views/error_404.php';
            }
        }

    }
}

?>