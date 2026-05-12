## Why

Actualmente, el componente `DoctorServices.vue` pierde los datos capturados cuando el usuario cambia de pestaña en el formulario de configuración. Esto se debe a que el componente se desmonta y gestiona un estado local redundante que no está sincronizado con el estado maestro del formulario en el componente padre.

## What Changes

- Refactorización de la comunicación entre `Dashboard.vue` (padre) y `DoctorServices.vue` (hijo) para eliminar la clonación de datos.
- Implementación de `defineModel` en `DoctorServices.vue` para un enlace de datos bidireccional nativo y limpio.
- Eliminación de estados locales, watchers y emisiones manuales innecesarias en el componente de servicios.
- Garantía de persistencia temporal de los datos en el estado del formulario de Inertia mientras el componente está desmontado.

## Capabilities

### New Capabilities
- `doctor-services-reactivity`: Especifica el comportamiento reactivo y de persistencia del estado para la sección de servicios médicos, asegurando que los datos sobrevivan al ciclo de vida del componente.

### Modified Capabilities
- `dashboard-ui`: Se actualiza para incluir requisitos sobre la gestión centralizada del estado y el uso de `defineModel` para componentes de formulario complejos.

## Impact

- `resources/js/Pages/Dashboard.vue`: Ajuste en cómo se pasan los datos al componente de servicios.
- `resources/js/Components/DoctorSection.vue`: Actúa como wrapper intermedio para la navegación por pestañas y alojamiento del v-model.
- `resources/js/Components/Doctor/DoctorServices.vue`: Refactorización completa de la lógica de estado y binding.
- Mejora en la experiencia de usuario (UX) al evitar la pérdida accidental de información.
