<?php

// Comprobar si se envió un formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('../../config.php');
    session_start();

    if (isset($_SESSION['sesion_email'])) {
        // Destruye la sesión
        session_destroy();

        // Redirige al usuario a la página de inicio
        header('Location: ' . $URL . '/index.php');
        exit;
    }
}
?>