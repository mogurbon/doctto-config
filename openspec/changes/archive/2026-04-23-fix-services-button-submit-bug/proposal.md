## Why

Se ha detectado un bug crítico en `DoctorServices.vue` donde los botones de interactividad interna (como agregar elementos a listas o expandir el acordeón) disparan el evento `submit` del formulario principal de Inertia. Esto ocurre debido a que los elementos `<button>` sin un atributo `type` explícito se comportan como `type="submit"` por defecto dentro de un `<form>`.

## What Changes

- Corrección técnica de todos los elementos `<button>` dentro de `DoctorServices.vue`.
- Inclusión obligatoria del atributo `type="button"` en botones de control interno.
- Auditoría de los botones de las listas dinámicas (`includes`, `docs`, `stop_meds`, `links`) y del acordeón.

## Capabilities

### New Capabilities
- Ninguna.

### Modified Capabilities
- `doctor-services-management`: Se agregan reglas de integridad de UI para prevenir envíos de formulario involuntarios.

## Impact

- **Frontend**: Modificación de `resources/js/Components/Doctor/DoctorServices.vue`.
- **User Experience**: Se previene la recarga accidental de la página y la pérdida de datos no guardados al interactuar con las listas dinámicas.
