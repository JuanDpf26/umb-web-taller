<?php
session_start(); // Inicia o reanuda la sesión

if (isset($_POST['usuario'])) {
    $_SESSION["usuario"] = $_POST['usuario'];
    echo "Sesión iniciada para " . $_SESSION["usuario"];
}

// Para destruir la sesión (logout) se usaría session_destroy()
?>