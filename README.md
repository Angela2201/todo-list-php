# To-Do List con PHP y CSV

Este es un proyecto simple de lista de tareas (To-Do List) hecho en PHP, donde las tareas se almacenan en un archivo CSV (`data.csv`). Es ideal para practicar el manejo de archivos en PHP sin usar una base de datos tradicional.

## 📋 Características

- Leer tareas desde un archivo `data.csv`.
- Agregar nuevas tareas.
- Cada tarea tiene un ID, texto y estado (`pendiente` o `completada`).
- Persistencia de datos usando CSV.
- Interfaz web ligera con un solo punto de entrada (`index.php`, o como lo llames).

## 🧱 Estructura del proyecto

- **data.csv**: almacena tareas en formato CSV (id, tarea, estado).
- **backend.php**: funciones PHP para leer (`readTasks`) y escribir (`addTask`) en el CSV.
- **index.php**: interfaz web donde se muestran las tareas y se agregan nuevas.
- **README.md**: este archivo.

## ⚙️ Requisitos

- PHP instalado en tu máquina (versión moderna recomendada).
- Un navegador para ver la interfaz web.
- (Opcional) Un servidor local: puedes usar el servidor embebido de PHP.

## 🚀 Instalación y ejecución

1. Clona o descarga el repositorio en tu máquina:

   ```bash
   git clone <URL-DEL-REPOSITORIO>
   cd todo-csv-app
    ```

2. Asegúrate de que el archivo `data.csv` exista en el directorio raíz. Si no, créalo con el siguiente contenido inicial:

    ```csv
    id,task,status
    1,Aprender PHP,completada
    2,Crear aplicación,pendiente
    ```

3. Inicia el servidor de desarrollo de PHP (opcional):

   ```bash
   php -S localhost:8000
   ```

4. Abre tu navegador y navega a `http://localhost:8000/index.php` (o simplemente abre `index.php` si no usas el servidor).

5. Ahí puedes ver las tareas actuales y agregar nuevas.

## 🔧 Cómo usar

- En la página principal (index.php), verás un formulario para escribir una nueva tarea.
- Cuando envías el formulario, se agrega una nueva línea al data.csv.
- Las tareas se muestran en una lista con su ID; puedes ver cuáles están pendientes o completadas (según cómo implementes el estado).
