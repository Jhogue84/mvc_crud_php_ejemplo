<?php
//Enrutador, que llamarar los controladores
namespace Lib;

class Route
{
    //mejorando codigo
    //igualmente el atributo a statico
    private static $routes = [];
    //metodos get y post que agregen las rutas al los arreglos GET y POST asi:
    static function get($uri, $callback)
    {
        //this hace referencia al objeto instanciado, entonces pasamos a static
        //$this->routes["GET"] = $callback;
        // despues de dispath  y crear dominio, editar lo del "/" con la siguiente linea.
        $uri = trim($uri, "/");
        self::$routes["GET"][$uri] = $callback;
    }

    static function post($uri, $callback)
    {
        //$this->routes["POST"] = $callback;
        $uri = trim($uri, "/");
        self::$routes["POST"][$uri] = $callback;
    }
    //metotdo dispathc, despachador  recuperar la uri qeu digito el usuario

    static function dispatch()
    {
        $uri = $_SERVER["REQUEST_URI"];
        //echo $uri; //desde la directorio, para eso es mejor crear dominio local, hosts
        $uri = trim($uri, "/");
        //capturar el metodo
        $method = $_SERVER["REQUEST_METHOD"];

        //recorrer la rutas "routes"
        foreach (self::$routes[$method] as $ruta => $callback) {
            //si conicide la ruta con la uri capturada
            // if ($ruta == $uri) {
            //     //que se ejecute la funcion, el callback de cada ruta.
            //     $callback();
            //     //si conicide salir
            //     return;
            // }
            /*primero las lineas desde comentario 1-        */
            if (strpos($ruta, ":") !== false) {
                //buscar con, reemplazar con, de la variable. //parametros
                //$ruta = preg_replace("#:[a-zA-Z]+#", "[a-zA-Z]+", $ruta);//modificar para poder enviar, es un subpatron, aumentar ()
                $ruta = preg_replace("#:[a-zA-Z]+#", "([a-zA-Z]+)", $ruta);
                //echo $ruta; //mostrar como queda la ruta
                // return;//para salir del foreach
            }

            //1- cuando se pasa parametros a la ruta, es necesario manejar expresiones regulares
            //% o cualquier otro signo como #
            //comodines ^ inicio , $ final
            if (preg_match("#^$ruta$#", $uri, $varArray)) { //aumentamos el parametro para capturar la variable enviada por la ruta
                //que se ejecute la funcion, el callback de cada ruta.
                //$callback();
                //nuevo parametro, es un array
                // var_dump($varArray);
                // echo "<br>";
                // echo json_encode($varArray);
                $params = array_slice($varArray, 1);
                // echo "<br>";
                //echo json_encode($params);
                //$callback(...$params); //desdoblar, extraer los elementos del array, como independientes.

                $response = $callback(...$params); //guardar el valor del retorno de web.php
                //echo $response;//es json
                if (is_array($response) || is_object($params)) {
                    header("Content-type: application/json");
                    echo json_encode($response);
                } else echo $response;

                //si conicide salir
                return;
            }
        }
        echo "<br>404 Not Found, Pagina no  encontrada error 404 !!";
    }
}
