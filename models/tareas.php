<?php

error_reporting(0);
session_start(); // -> $_SESSION
$_SESSION['token'] = bin2hex(random_bytes(64));
// print_r($_SESSION);
if (!isset($_SESSION['id_usuario'])) {
    header('location: index.php');
}

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

    <main class="centrado">
        <div class="app-container">
            <div class="tasks-panel">
                <!-- Formulario de Tareas -->
                <section id="taskFormSection">
                    <h2 data-i18n="task.input">Introduce una tarea</h2>
                    <form id="taskForm">
                        <input type="text" id="task" placeholder="Introduce una tarea" required data-i18n="task.input">
                        <div class="date-inputs">
                            <div class="date-field">
                                <label for="startDate" data-i18n="date.start">Fecha inicio:</label>
                                <input type="date" id="startDate" required>
                            </div>
                            <div class="date-field">
                                <label for="endDate" data-i18n="date.end">Fecha fin:</label>
                                <input type="date" id="endDate" required>
                            </div>
                        </div>
                        <select id="state" required>
                            <option value="pending" data-i18n="task.pending">Pendiente</option>
                            <option value="in_progress" data-i18n="task.inProgress">En Ejecución</option>
                            <option value="completed" data-i18n="task.completed">Realizada</option>
                        </select>
                        <button type="submit" data-i18n="task.add">Añadir tarea</button>
                    </form>
                </section>

                <!-- Secciones de Tareas -->
                <div class="tasks-container">
                    <section class="tasks-section">
                        <h2 data-i18n="task.pending">Pendientes</h2>
                        <ul class="tasks-list" id="pendingTasks">
                            <li>
                                Ejemplo de tarea pendiente
                                <div class="task-buttons">
                                    <button type="button" title="Mover a en ejecución"><i class="fas fa-arrow-right"></i></button>
                                    <button type="button" title="Eliminar tarea"><i class="fas fa-trash"></i></button>
                                </div>
                            </li>
                        </ul>
                    </section>

                    <section class="tasks-section">
                        <h2 data-i18n="task.inProgress">En Ejecución</h2>
                        <ul class="tasks-list" id="inProgressTasks">
                            <li>
                                Ejemplo de tarea en ejecución
                                <div class="task-buttons">
                                    <button type="button" title="Mover a completadas"><i class="fas fa-check"></i></button>
                                    <button type="button" title="Mover a pendientes"><i class="fas fa-arrow-left"></i></button>
                                    <button type="button" title="Eliminar tarea"><i class="fas fa-trash"></i></button>
                                </div>
                            </li>
                        </ul>
                    </section>

                    <section class="tasks-section">
                        <h2 data-i18n="task.completed">Realizadas</h2>
                        <ul class="tasks-list" id="completedTasks">
                            <li>
                                Ejemplo de tarea completada
                                <div class="task-buttons">
                                    <button type="button" title="Mover a en ejecución"><i class="fas fa-arrow-left"></i></button>
                                    <button type="button" title="Eliminar tarea"><i class="fas fa-trash"></i></button>
                                </div>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>

            <!-- Calendario -->
            <div class="calendar-container">
                <h2 data-i18n="calendar.title">Calendario de Tareas</h2>
                <div id="calendar"></div>
            </div>
        </div>
    </main>
    <?php include_once 'models/footer.php';?>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.10/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.10/index.global.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.10/locales-all.min.js'></script>
    <script src="./js/idioma.js"></script>
    <script src="./js/tema.js"></script>
    <script src="js/index.js"></script>
</body>

</html>
<?php
$_SESSION['error'] = false;
