<?php
session_start(); // -> $_SESSION
$_SESSION['token'] = bin2hex(random_bytes(64));


// include 'connection.php';
// require 'connection.php';
// include_once 'connection.php';

// Llamar a la conexión una vez
require_once 'control/connection.php';


?>

<!DOCTYPE html>
<html lang="es">

<head>
<?php include_once 'models/meta.php';?>
    <title>Gestor de Tareas</title>
      
</head>

<body>
<?php include_once 'models/header.php';?>
    <main class="main-index">
        <section>
            <img src="img/login.jpg" alt="Inicio sesion Gestor de tareas, hombre con tareas a sus alrededor">
        </section>
        <section >
<?php
$formulario = $_GET['formulario'] ?? 'login';

switch ($formulario) {
    case "login":
        include_once 'forms/form_login.php';
        break;
    case "crear_cuenta":
        include_once 'forms/form_crear_usuario.php';
        break;
    case "reset":
        include_once 'forms/form_reset_password.php';
        break;
}

?>
           
        </section>
    </main>
     <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.10/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.10/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/locales-all.min.js'></script>
    <script src="./js/idioma.js"></script>
    <script src="./js/tema.js"></script>
    <script src="js/index.js"></script>
    <?php include_once 'models/footer.php';?>
</body>

</html>
<?php
