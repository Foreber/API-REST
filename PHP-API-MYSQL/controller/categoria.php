<?php

header('Content-Type: application/json');

require_once("../config/conexion.php"); //Evaluamos el fichero con require_once, agregando la ruta entre "()"
require_once("../models/Categoria.php");

// creamos una varibable y la instanciamos con NEW
$categoria=new Categoria();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){ // Funcion de GET, POST

    case "GetAll":
    $datos=$categoria->get_categoria();

    echo json_encode($datos);

    break;

    case "GetId":
        $datos=$categoria->get_categoria_x_id($body["cat_id"]); //Consulta por ID

        echo json_encode($datos);

    break;

    case "insert":
        $datos=$categoria->insert_categoria($body["cat_nom"], $body["cat_obs"]); // Insertar datos, 2 parametros nom y obs

        echo json_encode("Insertado OK");

    break;

    case "update":
        $datos=$categoria->update_categoria($body["cat_id"], $body["cat_nom"], $body["cat_obs"]); // actualiza  datos, 3 parametros id, nom y obs
        echo json_encode("Actualizado OK");

    break;

    case "delete":
        $datos=$categoria->delete_categoria($body["cat_id"]); // desactivacion de datos por ID
        echo json_encode("Borrado OK");

    break;

}

?>