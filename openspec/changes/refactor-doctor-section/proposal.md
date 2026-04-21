## Why

Actualmente, el componente `DoctorSection.vue` es un archivo monolítico que gestiona múltiples secciones de configuración (perfil, contacto, horarios, reglas, etc.). Esta estructura dificulta el mantenimiento, la legibilidad y la escalabilidad del código a medida que se añaden nuevas funcionalidades. Esta refactorización busca alinear el componente con el requisito de modularidad del sistema y aplicar el patrón contenedor-presentador.

## What Changes

- Refactorización de `DoctorSection.vue` para actuar exclusivamente como componente contenedor.
- Extracción de las secciones de la interfaz a componentes hijos específicos en `resources/js/Components/Doctor/`.
- Delegación de la lógica de presentación y UI de cada sección a su componente correspondiente.
- Implementación de comunicación bidireccional mediante `v-model` para el manejo del estado del formulario.
- **NO** se introducen cambios funcionales, nuevos campos ni modificaciones en la UI existente.

## Capabilities

### New Capabilities
- Ninguna (Refactorización técnica pura).

### Modified Capabilities
- `dashboard-ui`: Se refuerza el requisito de modularidad mediante la descomposición de `DoctorSection.vue`.

## Impact

- `resources/js/Components/DoctorSection.vue`: Modificado para importar y usar los nuevos subcomponentes.
- `resources/js/Components/Doctor/`: Nuevo directorio que contendrá los subcomponentes extraídos.
- Mejor mantenibilidad y facilidad para realizar pruebas unitarias en componentes aislados.
