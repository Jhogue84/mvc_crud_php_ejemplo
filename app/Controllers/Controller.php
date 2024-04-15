<?php

namespace App\Controllers;

class Controller
{
    //metodo para la vista
    function view($miVista)
    {
        if (file_exists("../resources/views/{$miVista}.php")) {
            ob_start();
            include "../resources/views/{$miVista}.php";
            $vista = ob_get_clean();
            return $vista;
        } else {
            return "El archivo no existe";
        }
    }
}
