<?php
    require   "../vendor/autoload.php";
    header("Content-Type: application/json");
    use Api\Models\TokenModels;

    try {
        
         if(!isset($_GET['url']))
            throw new Exception("Url informada incorreta, verifique a url");

        $routes = explode("/",$_GET['url']);
  
        if($routes[0] !== 'api')
            throw new Exception("Erro de requisição");

        unset($routes[0]);
        $controler = isset($routes[1])? $routes[1] : "";

        if($controler !== 'token' && $controler !== 'apiKey'){
            TokenModels::validateRequest(); 
        }

        $method = strtolower($_SERVER['REQUEST_METHOD']);
        $id = "";

        if($method === 'get' || $method === 'delete'){
            $param = isset($routes[2])? $routes[2] : "";
        }
        
        if($method === 'post'){
            $param = $_POST;
        }

        if($method === 'put'){
            parse_str(file_get_contents('php://input'), $param);
            $id = isset($routes[2])? $routes[2] : "";
        }
       
        $classNameControllerApi = "Api\Controllers\\".ucfirst($controler)."Controller";
        
        if(!class_exists($classNameControllerApi))
            throw new Exception("Erro de requisição, api não implementada");

        echo json_encode([
            "status" => "sucess",
            "response" => call_user_func([$classNameControllerApi,$method],$param,$id)
        ],JSON_UNESCAPED_SLASHES);
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
    