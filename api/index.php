<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: application/json");

// Render envía una petición OPTIONS ANTES de PUT o DELETE
if ($_SERVER["REQUEST_METHOD"] === "OPTIONS") {
    http_response_code(200);
    exit();
}

require_once 'modelo.php';

$method = $_SERVER['REQUEST_METHOD'];
$data = json_decode(file_get_contents("php://input"), true);

switch ($method) {

    case 'GET':
        echo json_encode(obtenerTareas());
        break;

    case 'POST':
        if (!isset($data["titulo"]) || trim($data["titulo"]) === "") {
            echo json_encode(["error" => "Falta el título"]);
            exit();
        }
        crearTarea($data["titulo"]);
        echo json_encode(["mensaje" => "Tarea creada correctamente"]);
        break;

    case 'PUT':
        if (!isset($data["id"]) || !isset($data["titulo"])) {
            echo json_encode(["error" => "Faltan datos para actualizar"]);
            exit();
        }
        actualizarTarea($data["id"], $data["titulo"]);
        echo json_encode(["mensaje" => "Tarea actualizada"]);
        break;

    case 'DELETE':
        if (!isset($data["id"])) {
            echo json_encode(["error" => "Falta id para eliminar"]);
            exit();
        }
        eliminarTarea($data["id"]);
        echo json_encode(["mensaje" => "Tarea eliminada"]);
        break;

    default:
        echo json_encode(["error" => "Método no permitido"]);
        break;
}
?>
