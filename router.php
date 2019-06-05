<?php

class Router {//selects correct controller

    static public function parse($url, $request) {
        
        //www.voorbeeld.nl/controller/action/parameter
        $url = trim($url);
        
        //Default naar homepage wanneer geen extentie.
        if ($url == "/I-Project/" || $url == "/i-project/" || $url == "/") {
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

            if(file_exists($_SERVER['DOCUMENT_ROOT'].'/I-Project/localSettings.php')){
                $explode_addition = 1;
            }else{
                $explode_addition = 0;
            }
            
            //Als er een extentie is wordt er gekeken of deze bestaat. Anders 404 (mogelijk eigen controller?).
            $extension_depth = (0 + $explode_addition);
            if (file_exists(PATH . '/controller/' . $explode_url[$extension_depth] . 'Controller.php')) {
                $request->controller = $explode_url[$extension_depth];
                //links zonder tweede verwijzing gaan automatisch naar index.
                $extension_depth++;
                $request->action = (empty($explode_url[$extension_depth]) ? "index" : $explode_url[$extension_depth]);
                $extension_depth++;
                $request->params = array_slice($explode_url, $extension_depth);
            } else {
                include PATH . '/view/error_404.php';
                exit;
            }
        }

    }
}

?>