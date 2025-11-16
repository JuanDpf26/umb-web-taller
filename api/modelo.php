<?php
require_once 'db.php';

// CREATE
function crearTarea($titulo) {
    global $conexion;
    $titulo_seguro = htmlspecialchars($titulo);
    $sql = "INSERT INTO tareas (titulo) VALUES ('$titulo_seguro')";
    mysqli_query($conexion, $sql);
}

// READ
function obtenerTareas() {
    global $conexion;
    $sql = "SELECT * FROM tareas";
    $resultado = mysqli_query($conexion, $sql);
    $tareas = [];
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $tareas[] = $fila;
    }
    return $tareas;
}

// UPDATE
function actualizarTarea($id, $titulo) {
    global $conexion;
    $titulo_seguro = htmlspecialchars($titulo);
    $sql = "UPDATE tareas SET titulo='$titulo_seguro' WHERE id=$id";
    mysqli_query($conexion, $sql);
}

// DELETE
function eliminarTarea($id) {
    global $conexion;
    $sql = "DELETE FROM tareas WHERE id=$id";
    mysqli_query($conexion, $sql);
}
