<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type: application/json");

require_once 'modelo.php';

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {

    case 'GET':
        echo json_encode(obtenerTareas());
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        crearTarea($data['titulo']);
        echo json_encode(["ok" => true, "mensaje" => "Tarea creada exitosamente"]);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input"), true);

        // Si llega "titulo", es edición
        if (isset($data['titulo'])) {
            editarTarea($data['id'], $data['titulo']);
            echo json_encode(["ok" => true, "mensaje" => "Tarea actualizada"]);
        }
        // Si llega "completada", es toggle
        else if (isset($data['completada'])) {
            marcarCompletada($data['id'], $data['completada']);
            echo json_encode(["ok" => true, "mensaje" => "Estado actualizado"]);
        }
        break;

    case 'DELETE':
        $id = $_GET['id'];
        eliminarTarea($id);
        echo json_encode(["ok" => true, "mensaje" => "Tarea eliminada"]);
        break;

    default:
        echo json_encode(["ok" => false, "mensaje" => "Método no permitido"]);
        break;
}
?>
