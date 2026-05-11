## Why

Actualmente el Dashboard de configuración inicial del agente médico (DOCTTO) ya cuenta con un estado reactivo consolidado en el frontend, pero carece de la lógica para persistir este "payload" masivo (perfil, servicios, horarios, ubicación) de forma atómica y segura en el backend. Esta integración es crítica para permitir que el médico guarde su configuración final y el agente pueda comenzar a operar.

## What Changes

- **Frontend (Dashboard.vue):** Implementación del método `submit` utilizando `form.post` de Inertia para enviar el estado reactivo completo al servidor.
- **Backend (Rutas):** Definición de una ruta `POST` específica para el guardado de la configuración del agente.
- **Backend (Validación):** Creación de un `FormRequest` robusto para validar la estructura anidada del payload (doctor_profile, services, availability, location).
- **Backend (Controlador):** Implementación de la lógica de persistencia directa utilizando Eloquent para actualizar los modelos `User`, `Service` y `WorkspaceSetting` en una sola transacción.
- **Feedback:** Integración de estados de carga, manejo de errores de validación y notificaciones de éxito en la UI.

## Capabilities

### New Capabilities
- `dashboard-direct-persistence`: Capacidad de recibir, validar y guardar la configuración completa del consultorio y el agente desde el Dashboard.

### Modified Capabilities
- `dashboard-ui`: Se añaden los requisitos de interacción para el proceso de guardado y feedback de persistencia.
- `service-definition`: Se especifica cómo los servicios definidos se integran en el flujo de guardado masivo.

## Impact

- **Frontend:** `resources/js/Pages/Dashboard.vue` y componentes hijos que manejan la validación local.
- **Backend:** `app/Http/Controllers/DashboardController.php` (o nuevo controlador), creación de `app/Http/Requests/SaveDashboardRequest.php`.
- **Rutas:** `routes/web.php`.
- **Base de Datos:** Actualización de tablas `users`, `services` y `workspace_settings`.
