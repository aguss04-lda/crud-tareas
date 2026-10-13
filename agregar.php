<?php
// ==========================================
// AGREGAR TAREA
// ==========================================
// Este archivo recibe los datos del formulario de index.php
// y los inserta en la base de datos. Luego redirige a index.php.

include 'conexion.php';

// Verificar que el formulario haya sido enviado por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Recibir los datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    
    // Validar que el título no esté vacío
    if (empty($titulo)) {
        header("Location: index.php?error=titulo_vacio");
        exit;
    }
    
    // Insertar en la base de datos usando "prepared statements"
    // (evita inyección SQL)
    $stmt = $conexion->prepare("INSERT INTO tareas (titulo, descripcion) VALUES (?, ?)");
    $stmt->bind_param("ss", $titulo, $descripcion);
    $stmt->execute();
    
    // Cerrar el statement
    $stmt->close();
    
    // Redirigir a la página principal
    header("Location: index.php");
    exit;
}

// Si alguien entra directo a este archivo sin enviar el formulario,
// lo mandamos a index.php
header("Location: index.php");
exit;
?>