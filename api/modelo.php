<?php
require_once "db.php";

// CREATE
function crearTarea($titulo) {
    global $conexion;
    $titulo = mysqli_real_escape_string($conexion, htmlspecialchars($titulo));
    $sql = "INSERT INTO tareas (titulo, completada) VALUES ('$titulo', 0)";
    mysqli_query($conexion, $sql);
}

// READ
function obtenerTareas() {
    global $conexion;
    $sql = "SELECT * FROM tareas ORDER BY id DESC";
    $resultado = mysqli_query($conexion, $sql);
    $tareas = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $tareas[] = $fila;
    }
    return $tareas;
}

// UPDATE – Editar título
function actualizarTarea($id, $titulo) {
    global $conexion;
    $titulo = mysqli_real_escape_string($conexion, htmlspecialchars($titulo));
    $sql = "UPDATE tareas SET titulo = '$titulo' WHERE id = $id";
    mysqli_query($conexion, $sql);
}

// PATCH – Marcar completada
function marcarCompleta($id, $completada) {
    global $conexion;
    $sql = "UPDATE tareas SET completada = $completada WHERE id = $id";
    mysqli_query($conexion, $sql);
}

// DELETE
function eliminarTarea($id) {
    global $conexion;
    $sql = "DELETE FROM tareas WHERE id = $id";
    mysqli_query($conexion, $sql);
}
?>
