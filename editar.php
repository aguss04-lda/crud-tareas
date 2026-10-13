<?php
// ==========================================
// EDITAR TAREA
// ==========================================
// Este archivo permite editar una tarea existente.
// - Si llega por GET: muestra el formulario con los datos actuales.
// - Si llega por POST: guarda los cambios y redirige a index.php.

include 'conexion.php';

// Obtener el ID de la tarea desde la URL (ej: editar.php?id=1)
$id = $_GET['id'] ?? 0;

// Buscar la tarea en la base de datos
$stmt = $conexion->prepare("SELECT * FROM tareas WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$tarea = $resultado->fetch_assoc();

// Si la tarea no existe, volver al index
if (!$tarea) {
    header("Location: index.php");
    exit;
}

// Si el formulario fue enviado (POST), actualizar los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $completada = isset($_POST['completada']) ? 1 : 0;

    // Actualizar la tarea en la base de datos
    $stmt = $conexion->prepare("UPDATE tareas SET titulo = ?, descripcion = ?, completada = ? WHERE id = ?");
    $stmt->bind_param("ssii", $titulo, $descripcion, $completada, $id);
    $stmt->execute();
    $stmt->close();

    // Redirigir al index
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea - Agustín Arrascaeta</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="contenedor">
        <h1>✏️ Editar Tarea</h1>
        <p class="autor">Por Agustín Arrascaeta Cuevas</p>

        <form action="" method="POST" class="formulario">
            <input type="text" name="titulo" value="<?= htmlspecialchars($tarea['titulo']) ?>" required>
            <input type="text" name="descripcion" value="<?= htmlspecialchars($tarea['descripcion']) ?>">
            
            <label class="checkbox-label">
                <input type="checkbox" name="completada" <?= $tarea['completada'] ? 'checked' : '' ?>>
                Marcar como completada
            </label>
            
            <div class="botones-form">
                <button type="submit">💾 Guardar</button>
                <a href="index.php" class="btn-cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>