<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: application/json");

// Render envía una petición OPTIONS antes de PUT/DELETE
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
        if (!isset($data["id"])) {
            echo json_encode(["error" => "Falta ID"]);
            exit();
        }

        // Si viene 'completada', actualiza solo el estado
        if (isset($data["completada"])) {
            actualizarEstado($data["id"], $data["completada"]);
            echo json_encode(["mensaje" => "Estado actualizado"]);
            break;
        }

        // Si viene 'titulo', actualiza el título
        if (!isset($data["titulo"])) {
            echo json_encode(["error" => "Falta título"]);
            exit();
        }

        actualizarTarea($data["id"], $data["titulo"]);
        echo json_encode(["mensaje" => "Tarea actualizada"]);
        break;

    case 'DELETE':
        if (!isset($_GET["id"])) {
            echo json_encode(["error" => "Falta id"]);
            exit();
        }
        eliminarTarea($_GET["id"]);
        echo json_encode(["mensaje" => "Tarea eliminada"]);
        break;

    default:
        echo json_encode(["error" => "Método no permitido"]);
        break;
}
?>
