<?php
include_once 'controller/control.php';
include_once 'config/conexion.php';
$controller = new Control();

if(!isset($_REQUEST['c'])){
    $controller->index();
}else{
    $action = $_REQUEST['c'];
    switch($action){
        case 'nuevo':
            $controller->nuevo();
            break;
        case 'guardar':
            $controller->guardar();
            break;
        case 'editar':
            $controller->editar();
            break;
        case 'eliminar':
            $controller->eliminar();
            break;
            case 'volver':
            $controller->volver();
        default:
            $controller->index();
            break;
    }
}

?>