<?php
// ==========================================
// PÁGINA PRINCIPAL - LISTA DE TAREAS
// ==========================================
// Este archivo muestra todas las tareas de la base de datos
// y tiene un formulario para agregar una nueva.

include 'conexion.php';

// Consultar todas las tareas, ordenadas por fecha descendente
$resultado = $conexion->query("SELECT * FROM tareas ORDER BY fecha_creacion DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Tareas - Agustín Arrascaeta</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="contenedor">
        <h1>📋 Gestor de Tareas</h1>
        <p class="autor">Por Agustín Arrascaeta Cuevas</p>

        <!-- FORMULARIO PARA AGREGAR TAREA -->
        <form action="agregar.php" method="POST" class="formulario">
            <input type="text" name="titulo" placeholder="Título de la tarea" required>
            <input type="text" name="descripcion" placeholder="Descripción (opcional)">
            <button type="submit">➕ Agregar</button>
        </form>

        <!-- TABLA DE TAREAS -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($resultado->num_rows > 0): ?>
                    <?php while ($tarea = $resultado->fetch_assoc()): ?>
                    <tr>
                        <td><?= $tarea['id'] ?></td>
                        <td><?= htmlspecialchars($tarea['titulo']) ?></td>
                        <td><?= htmlspecialchars($tarea['descripcion']) ?></td>
                        <td>
                            <?= $tarea['completada'] ? '✅ Completada' : '⏳ Pendiente' ?>
                        </td>
                        <td class="acciones">
                            <a href="editar.php?id=<?= $tarea['id'] ?>" class="btn-editar">✏️ Editar</a>
                            <a href="eliminar.php?id=<?= $tarea['id'] ?>" class="btn-eliminar" onclick="return confirm('¿Eliminar esta tarea?')">🗑️ Eliminar</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="sin-tareas">No hay tareas registradas. ¡Agrega una!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>