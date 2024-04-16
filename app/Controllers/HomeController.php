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
        $cadenaSql = "select * from productos";

        //mejorar
        /*
        $productoModel->consultar($cadenaSql);
        return $productoModel->primero();
        */
        //concatenar metodos. editar el modelo que retonre el objeto this.
        return $productoModel->consultar($cadenaSql)->todos();
    }
}
