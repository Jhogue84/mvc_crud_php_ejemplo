<?php

use Lib\Route;

//asignar el control a los controladores.

Route::get("/", function () {
    //retornar y no escribir
    //echo "hola desde pagina principal";
    //retornar un json para ejemplo
    return [
        "title" => "Inicio",
        "content" => "Hola desde la pagina principal como json"
    ];
});
Route::get("/contactos", function () {
    //echo "Hola desde contactos";
    echo "Hola desde contactos";
});
Route::get("/mision", function () {
    //echo "Hola desde mision";
    return "Hola desde mision";
});

Route::get("/cursos/:miVariable/:tipo/", function ($miVariable, $tipo) {
    //Route::get("/cursos/:miVariable", function ($miVariable) {
    //echo "Hola desde cursos, y una variable:(cualquier curso) $miVariable $tipo";
    return "Hola desde cursos, y una variable:(cualquier curso) $miVariable $tipo";
});

Route::dispatch();
