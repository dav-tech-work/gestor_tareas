<?php

// Datos de acceso a la Base de Datos local
$host = "127.0.0.1";
$database = "gestor_tareas";
$port = 3307;
$user = "root";
$password = "root";

// Datos de acceso alternativos
$casa = "192.168.5.150";
$puerto = 30306;
$usuario = "root";
$pass = "D@n1el21";
$base = "gestor_tareas";

// Variable para almacenar la conexión activa
$conn = null;

try {
    // Intentar primera conexión (localhost)
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$database;", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Si llegamos aquí, la conexión fue exitosa
    // Opcional: registrar qué conexión está activa
    $conexion_activa = "local";
} catch (PDOException $e) {
    // Si falla la primera conexión, intentar con la segunda
    try {
        $conn = new PDO("mysql:host=$casa;port=$puerto;dbname=$base;", $usuario, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Si llegamos aquí, la segunda conexión fue exitosa
        $conexion_activa = "remota";
    } catch (PDOException $e2) {
        // Si ambas conexiones fallan
        die("Error de conexión: No se pudo conectar a ninguna base de datos. " . $e2->getMessage());
    }
}

// Opcional: puedes usar esta variable en tu aplicación para saber qué conexión está activa
// echo "Conexión activa: " . $conexion_activa;
