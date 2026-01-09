# 🎬 Cinema API - Sistema de Gestión de Tickets

API RESTful desarrollada en Laravel para la gestión y venta de tickets de cine. El proyecto sigue estándares de arquitectura limpia, incluye pruebas automatizadas y documentación interactiva.

## 🚀 Tecnologías y Herramientas

-   **Framework:** Laravel 11
-   **Lenguaje:** PHP 8.2
-   **Base de Datos:** PostgreSQL / SQLite (Testing)
-   **Autenticación:** Laravel Sanctum
-   **Documentación:** Scramble (OpenAPI/Swagger)
-   **Calidad de Código:** Form Requests, API Resources, Eloquent Relationships.

## ✨ Funcionalidades Principales

1.  **Autenticación Segura:** Registro y Login con emisión de Tokens (Bearer).
2.  **Gestión de Cartelera:** CRUD de Películas y Horarios.
3.  **Venta de Tickets:**
    -   Validación de asientos únicos por función.
    -   Transacciones de Base de Datos para integridad financiera.
    -   Historial de precios (Snapshot del precio al momento de compra).
4.  **Testing:** Pruebas automatizadas (Feature Tests) con base de datos en memoria.

## 📦 Instalación y Configuración

Sigue estos pasos para correr el proyecto localmente:

1. **Clonar el repositorio**
    ```bash
    git clone [https://github.com/TU_USUARIO/cinema-api-laravel.git](https://github.com/TU_USUARIO/cinema-api-laravel.git)
    cd cinema-api-laravel
    ```
2. **Instalar dependencias**
   composer install

3. **Configurar variables de entorno**

    ```cp .env.example .env
    php artisan key:generate
    ```

4. **Ejecutar migraciones**

    ```
    phpartisan migrate
    ```

5. **Iniciar el servidor**

    ```
    php artisan serve

    ```

### 📚 Documentación

Una vez iniciado el servidor, puedes ver la documentación interactiva en:
`http://localhost:8000/docs/api`

## ✅ Ejecución de pruebas (Testing)

```
php artisan test

```

## 📄 Licencia

Este proyecto es de código abierto y está disponible bajo la licencia MIT.
