<?php

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

session_start();
// Llamar a la conexión una vez
require_once 'connection.php';

foreach ($_POST as $clave => $valor) {
    $_POST[$clave] = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
}

/*
// Vigila si un bot intenta acceder
if ( !empty($_POST['web'])  ) {
    $_SESSION['error'] = true;
    header('location: index.php');
    exit();
}

// Par impedir el acceso directo a isert.php
if (!hash_equals($_SESSION['token'], $_POST['token'])) {
    $_SESSION['error'] = true;
    header('location: index.php');
    exit();
}
*/

$hash = password_hash($_POST['password'], PASSWORD_DEFAULT);


// 1. Definir la sentencia preparada
$insert = "INSERT INTO usuarios (name_user, password_user, email_user, lenguage_user) VALUES (:nombre, :pass, :email, :idioma);";
// 2. Preparación
$prep = $conn->prepare($insert);
// 3. Parametrizar los valores
$prep -> bindParam(':nombre', $_POST['nombre'], PDO::PARAM_STR);
$prep -> bindParam(':pass', $hash, PDO::PARAM_STR);
$prep -> bindParam(':email', $_POST['email'], PDO::PARAM_STR);
$prep -> bindParam(':idioma', $_POST['idioma'], PDO::PARAM_STR);

// 4. Ejecución
$prep->execute();



echo "Usuario creado correctamente";
$_SESSION['id_usuario'] = $conn->lastInsertId();
echo $_SESSION['id_usuario'];
// Volver a casa -> index.php
// header('location: index.php');

$prep = null;
$conn = null;
