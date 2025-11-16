<?php
require_once 'db.php';

// CREATE
function crearTarea($titulo) {
    global $conexion;
    $titulo = mysqli_real_escape_string($conexion, $titulo);
    $sql = "INSERT INTO tareas (titulo, completada) VALUES ('$titulo', 0)";
    mysqli_query($conexion, $sql);
}

// READ
function obtenerTareas() {
    global $conexion;
    $sql = "SELECT * FROM tareas ORDER BY id DESC";
    $result = mysqli_query($conexion, $sql);

    $tareas = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $tareas[] = $row;
    }
    return $tareas;
}

// UPDATE
function actualizarTarea($id, $titulo) {
    global $conexion;
    $titulo = mysqli_real_escape_string($conexion, $titulo);
    $sql = "UPDATE tareas SET titulo='$titulo' WHERE id=$id";
    mysqli_query($conexion, $sql);
}

// DELETE
function eliminarTarea($id) {
    global $conexion;
    $sql = "DELETE FROM tareas WHERE id=$id";
    mysqli_query($conexion, $sql);
}
?>
