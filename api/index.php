<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once 'modelo.php';

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {

    case 'GET':
        echo json_encode(obtenerTareas());
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        crearTarea($data['titulo']);
        echo json_encode(['mensaje' => 'Tarea creada']);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);
        actualizarTarea($data['id'], $data['titulo']);
        echo json_encode(['mensaje' => 'Tarea actualizada']);
        break;

    case 'DELETE':
        $data = json_decode(file_get_contents("php://input"), true);
        eliminarTarea($data['id']);
        echo json_encode(['mensaje' => 'Tarea eliminada']);
        break;

    default:
        echo json_encode(['mensaje' => 'Método no permitido']);
}
