<?php
require_once("../app/Config/database.php");
//la mejora es con el autoloader
require_once("../autoloader.php");


//require_once("../lib/Route.php");//con autoloader no es necesario
//y este arcchivo de index solo de configuracion, estas rutas llevarla a otro archivo, y lo invocamos aqui
/*
use Lib\Route;

Route::get("/", function () {
    echo "hola desde pagina principal";
});
Route::get("/contactos", function () {
    echo "Hola desde contactos";
});
Route::get("/mision", function () {
    echo "Hola desde mision";
});
*/
require_once("../routes/web.php");
