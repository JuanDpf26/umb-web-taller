<?php
$conexion = mysqli_connect(
    getenv("DB_HOST"),   // mainline.proxy.rlwy.net
    getenv("DB_USER"),   // root
    getenv("DB_PASS"),   // fwOvBEOCTUmoHuPUxmsHawlzRkiSAgRJ
    getenv("DB_NAME"),   // railway
    getenv("DB_PORT")    // 54062
);

if (mysqli_connect_errno()) {
    echo "Error de conexión: " . mysqli_connect_error();
    exit();
}
?>
