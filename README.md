# Sistema para el control de pacientes (Proyecto final)

Este sistema es para el control de pacientes básico, para registrar pacientes, doctores, configurar citas, consultas
y en estas asignar examenes y diagnósticos

---

## Tabla de Contenidos

* [Características](#características)
* [Requisitos](#requisitos)
* [Instalación](#instalación)
* [Uso](#uso)
* [Estructura del Proyecto](#estructura-del-proyecto)
* [Tecnologías Utilizadas](#tecnologías-utilizadas)
* [Autoras](#autoras)

---

## Características

* Autenticación de usuarios (registro, login, logout).
* CRUD completo para sistema control de pacientes.

---

## Requisitos

Asegúrate de tener instalado lo siguiente en tu sistema:

* PHP >= 8.1
* Composer
* Node.js >= 14
* npm o Yarn
* Base de datos (MySQL)

---

## Instalación

Sigue estos pasos para configurar y ejecutar la aplicación en tu entorno local:

1.  **Clona el repositorio:**
    ```bash
    git clone [https://github.com/karen527jun/control_pacientes.git]
    cd [nombre-de-carpeta-de-proyecto]
    ```

2.  **Instala las dependencias de Composer:**
    ```bash
    composer install
    ```

3.  **Crea el archivo de entorno `.env`:**
    ```bash
    cp .env.example .env
    ```

4.  **Genera la clave de la aplicación:**
    ```bash
    php artisan key:generate
    ```

5.  **Configura tu base de datos en el archivo `.env`:**
    Asegúrate de reemplazar los valores con tus credenciales:
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=control_paciente
    DB_USERNAME=your_database_user
    DB_PASSWORD=your_database_password
    ```

6.  **Ejecuta las migraciones de la base de datos:**
    ```bash
    php artisan migrate
    ```
    Existen datos de ejemplos para pacientes, doctores, examenes y medicamentos:
    ```bash
    php artisan db:seed
    ```

7.  **Instala las dependencias de Node.js:**
    ```bash
    npm install # o yarn install
    ```

8.  **Compila los assets con Vite:**
    Para desarrollo (observa cambios en tiempo real):
    ```bash
    npm run dev # o yarn dev
    ```

9.  **Inicia el servidor de desarrollo de Laravel:**
    ```bash
    php artisan serve
    ```

Ahora deberías poder acceder a la aplicación en tu navegador en `http://127.0.0.1:8000` (o el puerto que te indique Laravel).

---

## Uso

* Se debe crear una cuenta de administrador, para hacer la creación de doctores y pacientes.
* Es una aplicación pensada para administrar una clínica, más no para uso público


---

## Estructura del Proyecto

Esta aplicación sigue el patrón **Modelo-Vista-Controlador (MVC)**, el cual es fundamental en Laravel. Además, utiliza **Vite** para la compilación de assets.

* **`app/Models`**: Contiene los modelos Eloquent que interactúan con la base de datos. Cada modelo representa una tabla en la base de datos.
* **`app/Http/Controllers`**: Contiene los controladores que manejan las peticiones HTTP y la lógica de negocio.
* **`resources/views`**: Contiene las plantillas Blade que definen la interfaz de usuario (Vistas).
* **`routes`**: Define las rutas de la aplicación (web, api, console, channels).
* **`database/migrations`**: Contiene las migraciones de la base de datos para crear o modificar tablas.
* **`database/seeders`**: Contiene los seeders para poblar la base de datos con datos de prueba.
* **`public`**: El directorio raíz del servidor web, contiene los archivos públicos como CSS, JavaScript y las imágenes compilados por Vite.
* **`resources/js`**: Contiene los archivos JavaScript la aplicación (ej: `app.js`). Vite procesa estos archivos.
* **`resources/css`**: Contiene los archivos CSS/SCSS la aplicación (ej: `app.css`). Vite también procesa estos archivos.
* **`vite.config.js`**: Archivo de configuración de Vite.
* **`recursos/js`**: Contiene funciones javascript para el funcionamiento de las alertas y peticiones.

---

## Tecnologías Utilizadas

* **Laravel**: Framework de PHP para aplicaciones web (MVC).
* **Vite**: Herramienta de construcción de frontend.
* **PHP**: Lenguaje de programación backend.
* **MySQL**: Base de datos utilizada.
* **HTML5/CSS3/JavaScript**: Tecnologías frontend.
* **Blade**: Motor de plantillas de Laravel.
* **Bootsrap**: Para plantillas de estilo.
* **SweetAlert2**: Para manejar las alertas de las peticiones.


## Autoras:

* `Karen Adriana Martínez Rivera 141124`
* `Andrea Paola García Vásquez 028924`
* `Yancy Eunice Gómez Hernández 006524`
