<?php
    require   "../vendor/autoload.php";
    header("Content-Type: application/json");

    try {
        
         if(!isset($_GET['url']))
            throw new Exception("Url informada incorreta, verifique a url");

        $routes = explode("/",$_GET['url']);
  
        if($routes[0] !== 'api')
            throw new Exception("Erro de requisição");

        unset($routes[0]);
        $controler = isset($routes[1])? $routes[1] : "";
        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $param = isset($routes[2])? $routes[2] : "";;
        
        $classNameControllerApi = "Api\Controlers\\".ucfirst($controler)."Controler";
        
        if(!class_exists($classNameControllerApi))
            throw new Exception("Erro de requisição, api não implementada");

        echo json_encode([
            "status" => "sucess",
            "response" => call_user_func([$classNameControllerApi,$method],$param)
        ],JSON_UNESCAPED_UNICODE);
        http_response_code(200);
        exit;   
    } catch (\Throwable $th) {
        http_response_code(404);
        echo json_encode([
            "status" => "error", 
            "response" => $th->getMessage()
        ],JSON_UNESCAPED_UNICODE);
        exit;
    }
    