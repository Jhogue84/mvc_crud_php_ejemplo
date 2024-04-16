<?php

namespace App\Models;

use mysqli;

class Model
{
    protected $db_host = DB_HOST;
    protected $db_user = DB_USER;
    protected $db_pass = DB_PASS;
    protected $db_name = DB_NAME;

    protected $conexion; //variable para almacenar la conexion

    protected $consulta;

    protected $table; //para evitar error del editor, no del codigo.

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
        } /*else {
            echo "La conexion fue exitosa";
        }*/
    }

    function consultar($cadenaSql)
    {
        //$cadenaSql = "select * from productos";
        //return $this->consulta = $this->conexion->consultar($cadenaSql);
        $this->consulta = $this->conexion->query($cadenaSql);
        return $this;
    }
    //metodos para recuperar la consulta, retornan
    function primero()
    {
        return $this->consulta->fetch_assoc();
    }
    function todos()
    {
        return $this->consulta->fetch_all(MYSQLI_ASSOC);
    }

    //consultas
    function all()
    {
        //select * from cualquierTabla
        $cadenaSql = "select * from productos"; //esta ya no es dinamica
        //mejorada la consulta
        //obtengo el nombre de la tabla: $this->table; //puede marcar error el editor(non codigo), por noestar esta propieda en este modelo.
        $cadenaSql = "select * from {$this->table}";
        //$this->consultar($cadenaSql)->todos();//retornarlo
        return $this->consultar($cadenaSql)->todos(); //retornarlo
    }

    function findById($id)
    {
        $cadenaSql = "select * from {$this->table} where productoid={$id}";
        return $this->consultar($cadenaSql)->primero();
    }

    function where($columna, $valor)
    {
        $cadenaSql = "select * from {$this->table} where {$columna} = '{$valor}'";
        return $this->consultar($cadenaSql)->todos();
        //return $this->consultar($cadenaSql);//devuelve solo el objeto, y en el controller aplica el otro metodo si todos o el primero.
    }
}
