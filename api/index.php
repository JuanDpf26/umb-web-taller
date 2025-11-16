<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Content-Type: application/json");

require_once "modelo.php";

$metodo = $_SERVER["REQUEST_METHOD"];

switch ($metodo) {

    // ---------------------------------------
    // GET – LISTAR TAREAS
    // ---------------------------------------
    case "GET":
        echo json_encode(obtenerTareas());
        break;

    // ---------------------------------------
    // POST – CREAR TAREA
    // ---------------------------------------
    case "POST":
        $data = json_decode(file_get_contents("php://input"), true);
        crearTarea($data["titulo"]);
        echo json_encode(["mensaje" => "Tarea creada"]);
        break;

    // ---------------------------------------
    // DELETE – ELIMINAR TAREA
    // ---------------------------------------
    case "DELETE":
        $id = $_GET["id"];
        eliminarTarea($id);
        echo json_encode(["mensaje" => "Tarea eliminada"]);
        break;

    // ---------------------------------------
    // PUT – EDITAR TÍTULO
    // ---------------------------------------
    case "PUT":
        $id = $_GET["id"];
        $data = json_decode(file_get_contents("php://input"), true);
        actualizarTarea($id, $data["titulo"]);
        echo json_encode(["mensaje" => "Tarea actualizada"]);
        break;

    // ---------------------------------------
    // PATCH – MARCAR COMPLETADA
    // ---------------------------------------
    case "PATCH":
        $id = $_GET["id"];
        $data = json_decode(file_get_contents("php://input"), true);
        marcarCompleta($id, $data["completada"]);
        echo json_encode(["mensaje" => "Estado actualizado"]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["mensaje" => "Método no permitido"]);
        break;
}
?>
