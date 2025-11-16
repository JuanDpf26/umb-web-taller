<?php
require_once 'db.php';

// CREATE
function crearTarea($titulo) {
    global $conexion;
    $titulo_seguro = htmlspecialchars($titulo);

    $sql = "INSERT INTO tareas (titulo, completada) VALUES ('$titulo_seguro', 0)";
    return mysqli_query($conexion, $sql);
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

// UPDATE titulo
function editarTarea($id, $titulo) {
    global $conexion;
    $titulo_seguro = htmlspecialchars($titulo);

    $sql = "UPDATE tareas SET titulo='$titulo_seguro' WHERE id=$id";
    return mysqli_query($conexion, $sql);
}

// UPDATE completada
function marcarCompletada($id, $completada) {
    global $conexion;
    $sql = "UPDATE tareas SET completada=$completada WHERE id=$id";
    return mysqli_query($conexion, $sql);
}

// DELETE
function eliminarTarea($id) {
    global $conexion;
    $sql = "DELETE FROM tareas WHERE id=$id";
    return mysqli_query($conexion, $sql);
}
?>

