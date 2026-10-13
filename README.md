# CRUD de Tareas - Agustín Arrascaeta Cuevas

Aplicación web para gestión de tareas con operaciones Crear, Leer, Actualizar y Eliminar. Desarrollada como proyecto personal para fortalecer mis habilidades en desarrollo backend con PHP y bases de datos MySQL.

CRUD es el acrónimo de Create, Read, Update y Delete (Crear, Leer, Actualizar y Borrar). Representa las cuatro operaciones fundamentales necesarias para la gestión de datos en cualquier aplicación informática y base de datos.

## Funcionalidades

- ✅ **Crear** tareas con título y descripción.
- ✅ **Leer** la lista completa de tareas ordenadas por fecha.
- ✅ **Actualizar** tareas existentes (título, descripción y estado).
- ✅ **Eliminar** tareas con confirmación previa.
- ✅ **Marcar como completada** una tarea.
- ✅ **Diseño responsive** que se adapta a dispositivos móviles.

## Tecnologías

- **Backend**: PHP 8.5
- **Base de datos**: MySQL 8.4
- **Frontend**: HTML5, CSS3
- **Servidor local**: PHP Development Server    

## Estructura del proyecto

crud-tareas/
├── index.php # Página principal (lista de tareas)
├── agregar.php # Procesa el formulario de nueva tarea
├── editar.php # Formulario de edición + actualización
├── eliminar.php # Elimina una tarea por ID
├── conexion.php # Conexión a MySQL
├── css/
│ └── styles.css # Estilos del CRUD
└── README.md