<?php
require_once 'db.php';

// CREATE (Crear)
function crearTarea($titulo) {
    global $conexion;
    // Usar htmlspecialchars para prevenir XSS
    $titulo_seguro = htmlspecialchars($titulo);
    $sql = "INSERT INTO tareas (titulo) VALUES ('$titulo_seguro')";
     mysqli_query($conexion, $sql);
}

// READ (Leer)
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
// ... (Aquí se implementarían Update y Delete)
?>