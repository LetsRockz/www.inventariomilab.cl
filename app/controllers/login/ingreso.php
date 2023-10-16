<?php
include('../../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén los datos del formulario
    $email = $_POST['email'];
    $password_user = $_POST['password_user'];

    // Prepara la consulta SQL usando marcadores de posición
    $sql = "SELECT * FROM tb_usuarios WHERE email = :email AND password_user = :password_user";

    try {
        // Prepara la consulta
        $query = $pdo->prepare($sql);

        // Vincula los valores a los marcadores de posición
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->bindParam(':password_user', $password_user, PDO::PARAM_STR);

        // Ejecuta la consulta
        $query->execute();

        // Obtiene los resultados como un arreglo asociativo
        $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

        // Inicializa el contador
        $contador = 0;

        // Itera a través de los resultados
        foreach ($usuarios as $usuario) {
            $email_tabla = $usuario['email'];
            $nombres = $usuario['nombre'];
            $contador++; // Incrementa el contador
        }

        // Comprueba el valor del contador y muestra un mensaje apropiado
        if ($contador == 0) {
            echo "Datos incorrectos, vuelva a intentarlo";
        } else {
            session_start();
            $_SESSION['sesion_email'] = $email;
            header('Location:' . $URL . '/index.php');
            exit;
        }
    } catch (PDOException $e) {
        // Manejo de errores en caso de que la consulta falle
        echo "Error en la consulta: " . $e->getMessage();
    }
}
?>