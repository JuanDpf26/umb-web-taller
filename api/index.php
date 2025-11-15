<?php
// Esto permite solicitudes desde otros dominios (el frontend)
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");

require_once 'modelo.php';

$metodo = $_SERVER['REQUEST_METHOD'];

switch ($metodo) {
    case 'GET':
        $tareas = obtenerTareas();
        echo json_encode($tareas);
        break;
    case 'POST':
        // Capturar datos de formulario (simulando $_POST)
        $datos = json_decode(file_get_contents('php://input'), true);
        crearTarea($datos['titulo']);
        echo json_encode(['mensaje' => 'Tarea creada']);
        break;
    default:
        echo json_encode(['mensaje' => 'Método no permitido']);
        break;
}
?>