<?php
// Datos de conexión a la base de datos
define('DB_HOST', 'localhost'); // Dirección IP o nombre del servidor
define('DB_PORT', '3307'); // Puerto personalizado (en este caso, el puerto 3307)
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sistemadeinventario');

try {
    // Crear una instancia de PDO para la conexión a la base de datos
    $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME;
    $options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    );
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);

    //echo "La conexión a la base de datos ha sido exitosa";
} catch (PDOException $e) {
    // Manejar errores de conexión
    echo "Error en la conexión: " . $e->getMessage();
}

$URL = "http://localhost/www.inventariomilab.cl";
?>