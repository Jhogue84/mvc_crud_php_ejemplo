<?php

namespace App\Controllers;

use App\Models\Producto;

class HomeController extends Controller
{
    function index()
    {
        //return "Hola desde pagina de Inicio con controller.";
        //return $this->view("home",); //+adelante, vistas por carpetas. aprendices.home, adelante reemplazar el . por el /

        $productoModel = new Producto();

        //ejemplo retorno, variable fijas
        //return $this->view("home", ["titulo" => "HOME", "descripcion" => "Pagina de Home"]);
        return $productoModel->listar();
    }

    //metodo para la vista,+adelande paasamo a un archivo independiente, ya que todos los controladores lo pueden utilizar. yesta clase hereda
    /*
    function view($miVista)
    {
        if (file_exists("../resources/views/{$miVista}.php")) {
            //+adelante reescribir mivista, reemplazando el . por /
            //return "El archivo existe";
            //no sigue la estructura. hay que incluir, almacenando
            //return include "../resources/views/{$miVista}.php";
            //mejorando
            ob_start();
            include "../resources/views/{$miVista}.php";
            $vista = ob_get_clean();
            return $vista;
        } else {
            return "El archivo no existe";
        }
    }
    */
}
