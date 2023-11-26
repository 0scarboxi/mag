<?php

namespace Core;

    class App{ 
        function __construct(){
            //Transformacion para el controlador en este caso beer en vez de home
            isset($_GET["url"]) ? $url = $_GET["url"] : $url = "beer";
            $arguments = explode('/',trim($url,'/'));//saca un arrar sin barras de la url

            //obtener controlador
            $controllerName = array_shift($arguments); // user | product | home...
                                                      // UserController , ProductController
            $controllerName = ucwords($controllerName) . "Controller";
            //var_dump($controllerName);
            //die();

            // Transformacio para metodos
            count($arguments) > 0 ? $method = array_shift($arguments) : $method = "index";

            //importar el controlador 
            $file = "../app/controllers/$controllerName" . ".php";

            //var_dump($file);
            //die();
            
            if(file_exists($file)){
                require "$file";
            }else {
                http_response_code(404);
                echo "Recurso no encontrado";
                die("Adios");
            }

            //crear instancia del controlador y llamar al metodo
            $controllerName ="\\App\\Controllers\\" . $controllerName;
            $controllerObject = new $controllerName; //new \App\Controllers\
            if(method_exists($controllerObject,$method)){
                //invocarlo
                $controllerObject->$method($arguments);
            }else{
                http_response_code(404);
                echo "funcion no encontrada";
                die("Adios2");
            }


        }// fin construct


    }//fin clase