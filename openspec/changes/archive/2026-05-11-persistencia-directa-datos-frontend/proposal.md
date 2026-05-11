## Why

Actualmente el proyecto necesita un patrón estandarizado y minimalista para la persistencia de datos desde el frontend hacia el backend. Para evitar la sobreingeniería en operaciones CRUD simples, es necesario establecer un flujo directo (Ruta -> Request -> Controlador -> Eloquent) que garantice seguridad, validación estricta y mantenibilidad sin capas intermedias innecesarias (Jobs, Services, Events).

## What Changes

- **Rutas:** Definición de nuevas rutas `POST` protegidas por autenticación y validación de tenant.
- **Validación (Form Request):** Creación de clases `FormRequest` para definir reglas de validación estrictas, utilizando `$request->validated()` para la inserción.
- **Controladores:** Implementación de métodos `store` minimalistas que interactúan directamente con Eloquent mediante asignación masiva.
- **Respuestas:** Uso de redirecciones estándar de Inertia (`return back()->with(...)`) para feedback inmediato al usuario.

## Capabilities

### New Capabilities
- `direct-persistence-flow`: Flujo estandarizado para la recepción, validación y persistencia directa de datos provenientes de Inertia.js.

### Modified Capabilities
<!-- No requirement changes in existing specs, this is a new implementation pattern. -->

## Impact

- **Backend:** Afecta a controladores, clases de validación (Form Requests) y archivos de rutas.
- **Frontend:** Estandariza cómo se manejan las respuestas de éxito/error tras el envío de formularios desde Vue.
- **Base de Datos:** Persistencia directa a través de modelos Eloquent.
