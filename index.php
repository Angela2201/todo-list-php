<?php
require_once 'backend.php';

// Si el formulario se ha enviado para agregar una tarea
if (isset($_POST['new_task'])) {
  $newTask = trim($_POST['new_task']);
  if ($newTask !== '') {
    addTask($newTask);
  }
  header('Location: index.php');
  exit;
}

// Leer todas las tareas
$tasks = readTasks();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>To-Do List (CSV)</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css">
  <style>
    body {
      font-family: Arial;
      margin: 20px;
      max-width: 600px;
    }

    ul {
      list-style: none;
      padding: 0;
    }

    li {
      margin: 8px 0;
    }

    s {
      color: gray;
    }
  </style>
</head>

<body>
  <h1>Lista de Tareas</h1>

  <form method="post" action="index.php">
    <input type="text" name="new_task" placeholder="Nueva tarea..." required>
    <button type="submit">Agregar</button>
  </form>

  <ul>
    <?php foreach ($tasks as $t): ?>
      <li>
        <?php if ($t['status'] == 1): ?>
          <s><?= htmlspecialchars($t['task']) ?></s>
        <?php else: ?>
          <?= htmlspecialchars($t['task']) ?>
        <?php endif; ?>
        <!-- (ID: <?= $t['id'] ?>) -->
      </li>
    <?php endforeach; ?>
  </ul>

</body>

</html>