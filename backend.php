<?php

define('CSV_FILE', __DIR__ . '/data.csv');

/**
 * Lee todas las tareas del CSV y las devuelve como un arreglo de arrays asociativos.
 * @return array
 */
function readTasks()
{
  $tasks = [];

  // Abrir el archivo para lectura
  if (($handle = fopen(CSV_FILE, 'r')) !== false) {
    // Recorremos cada línea
    while (($data = fgetcsv($handle, 0, ",", '"', "")) !== false) {
      // Suponemos que cada línea siempre tiene id, task, status
      // Si no las tuviera, habría que validar
      $tasks[] = [
        'id' => $data[0],
        'task' => $data[1],
        'status' => $data[2]
      ];
    }
    fclose($handle);
  }

  return $tasks;
}

/**
 * Escribe (añade) una nueva tarea al CSV.
 * Le asigna un nuevo id (incremental basado en las existentes).
 * @param string $taskText
 * @return bool True si escribió correctamente, false si no
 */
function addTask($taskText)
{
  $tasks = readTasks();

  // Determinar nuevo ID
  $maxId = 0;
  foreach ($tasks as $task) {
    $tid = intval($task['id']);
    if ($tid > $maxId) {
      $maxId = $tid;
    }
  }
  $newId = $maxId + 1;

  // Normalizar texto
  $taskText = trim($taskText);

  // Abrir el archivo para escribir al final (modo append)
  if (($handle = fopen(CSV_FILE, 'a')) !== false) {
    // Crear la nueva línea en formato CSV
    $line = [$newId, $taskText, 0];
    // Escribirla
    if (fputcsv($handle, $line) === false) {
      fclose($handle);
      return false;
    }
    fclose($handle);
    return true;
  }

  return false;
}
