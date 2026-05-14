## Why

Tras la refactorización `refactor-doctor-services-reactivity`, se detectó que los datos capturados en la pestaña de "Servicios" del formulario del médico se pierden al navegar hacia otra pestaña (como "Perfil") y regresar. Esto ocurre porque el renderizado condicional basado en `v-if` destruye el componente `DoctorServices.vue` y su estado local no se sincroniza con el estado global lo suficientemente rápido o de manera persistente ante la destrucción del DOM.

## What Changes

- Cambiar la lógica de renderizado de las pestañas en el componente contenedor (probablemente `DoctorSection.vue` o similar) de `v-if` a `v-show` para preservar el estado de los componentes hijos en el DOM.
- Ajustar estilos CSS (clases `hidden` de Tailwind) para manejar la visibilidad de las pestañas sin destruirlas.
- Asegurar que las mutaciones en `DoctorServices.vue` afecten directamente al modelo compartido (presumiblemente un objeto `useForm` de Inertia) para garantizar integridad de datos.

## Capabilities

### New Capabilities
<!-- No se introducen nuevas capacidades funcionales a nivel de especificación, sino correcciones de comportamiento en la UI. -->

### Modified Capabilities
- `dashboard-ui`: Se ajusta el requisito de navegación entre pestañas para garantizar que no haya pérdida de datos durante la sesión de edición del formulario.

## Impact

- **Frontend**: Afecta al componente wrapper de la sección del médico y a los componentes de pestañas (`DoctorServices.vue`, `DoctorProfile.vue`, etc.).
- **Experiencia de Usuario**: Mejora crítica en la usabilidad al evitar la pérdida accidental de información durante el proceso de configuración.
