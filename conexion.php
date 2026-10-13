<?php
// ==========================================
// ARCHIVO DE CONEXIÓN A LA BASE DE DATOS
// ==========================================
// Este archivo se encarga de conectarse a MySQL.
// Se incluye en todos los demás archivos con include.

$host = "localhost";        // Servidor donde está MySQL
$usuario = "crud_user";          // Usuario de MySQL
$password = "crud123";             // Contraseña
$base_datos = "crud_tareas"; // Nombre de la base de datos

// Crear la conexión
$conexion = new mysqli($host, $usuario, $password, $base_datos);

// Verificar si hubo error
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Configurar caracteres especiales (ñ, tildes, etc.)
$conexion->set_charset("utf8");
?>