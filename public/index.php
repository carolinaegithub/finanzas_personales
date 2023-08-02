<?php

require("../vendor/autoload.php");

use App\Controllers\IncomesController;
use App\Controllers\WithdrawalsController;
use Router\RouterHandler;

// Obtener la URL
$slug = $_GET["slug"] ?? "";
$slug = explode("/", $slug);

$resource = $slug[0] == "" ? "/" : $slug[0];
$id = $slug[1] ?? null;

// Instancia del router
$router = new RouterHandler();

switch ($resource) {
    case '/':
        require('home.php');
        break;

    case "incomes":

        #Si existe info dentro de POST como metodo la usamos si no usamos get
        $method = $_POST["method"] ?? "get";
        #usamos la funcion method del archivo RoutherHandler
        $router->set_method($method);
        #Usamos la funcion data para establecer la info del form
        $router->set_data($_POST);
        #Empieza a enrutar todo y usamos la clase de IncomesCotroller para acceder a sus metodos
        #Contiene el id que trae de arriba de la url o puede ser null
        $router->route(IncomesController::class, $id);

        break;

    case "withdrawals":

        $method = $_POST["method"] ?? "get";
        $router->set_method($method);
        $router->set_data($_POST);
        $router->route(WithdrawalsController::class, $id);

        break;
    
    default:
    //Podemos meterle un icono mas descriptivo aaa
        echo "Ups... Algo salió mal 😢";
        break;
}
