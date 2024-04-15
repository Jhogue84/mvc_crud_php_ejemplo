<?php

namespace App\Models;

//libreria de mysql, estas se importan automaticamente
use mysqli;

class Producto
{
    /*
    protected $db_host = "localhost"; //para utilizar constantes definidas, incluir en el index
    protected $db_user = "root";
    protected $db_pass = "";
    protected $db_name = "pedidos";*/
    protected $db_host = DB_HOST;
    protected $db_user = DB_USER;
    protected $db_pass = DB_PASS;
    protected $db_name = DB_NAME;

    protected $conexion; //variable para almacenar la conexion

    //constructor
    function __construct()
    {
        $this->conectar();
    }

    function conectar()
    {
        $this->conexion = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        //validadr la conexion
        if ($this->conexion->connect_error) {
            die("Error de conexion: " . $this->conexion->connect_error);
        } else {
            echo "La conexion fue exitosa";
        }
    }
}
