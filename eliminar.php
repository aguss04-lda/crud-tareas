<?php
// ==========================================
// ELIMINAR TAREA
// ==========================================
// Este archivo recibe el ID de una tarea por la URL,
// la elimina de la base de datos y redirige a index.php.

include 'conexion.php';

// Obtener el ID de la tarea desde la URL (ej: eliminar.php?id=1)
$id = $_GET['id'] ?? 0;

// Validar que el ID sea un número mayor a 0
if ($id <= 0) {
    header("Location: index.php");
    exit;
}

// Eliminar la tarea usando prepared statement (evita inyección SQL)
$stmt = $conexion->prepare("DELETE FROM tareas WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

// Redirigir a la página principal
header("Location: index.php");
exit;
?>