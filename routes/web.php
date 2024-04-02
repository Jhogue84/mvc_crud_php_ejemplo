<?php

use Lib\Route;
use App\Controllers\HomeController;

//asignar el control a los controladores.
/*
Route::get("/", function () {
    return HomeController::class;//para ver la ruta
});
*/

Route::get("/", [HomeController::class, "index"]); //ahora pasamos un arreglo - callback


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
