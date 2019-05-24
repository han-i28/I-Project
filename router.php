<?php

class Router {

    static public function parse($url, $request) {
        //www.voorbeeld.nl/controller/action/parameter
        $url = trim($url);
        
        //Default naar homepage wanneer geen extentie.
        if ($url == "/I-Project/" || $url == "/i-project/") {
            $request->controller = "home";
            $request->action = "index";
            $request->params = [];
        } else {

            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 1);

            foreach($explode_url as $key => $value) {
                $explode_url[$key] = substr($value, 0, strpos($value, "?"));
                if(empty($explode_url[$key])) {
                    $explode_url[$key] = $value;
                }
            }

            //Als er een extentie is wordt er gekeken of deze bestaat. Anders 404 (mogelijk eigen controller?).
            if (file_exists(PATH . '/controller/' . $explode_url[0] . 'Controller.php')) {
                $request->controller = $explode_url[0];
                //links zonder tweede verwijzing gaan automatisch naar index.
                $request->action = (empty($explode_url[1]) ? "index" : $explode_url[1]);
                $request->params = array_slice($explode_url, 2);
            } else {
                include PATH . '/view/error_404.php';
                exit;
            }
        }

    }
}

?>