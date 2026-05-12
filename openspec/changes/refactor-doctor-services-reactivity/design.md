## Context

Actualmente, el componente `DoctorServices.vue` gestiona la lista de servicios médicos dentro del formulario de configuración del dashboard. El problema reportado es que al cambiar entre las pestañas de la sección del médico (Perfil, Contacto, Horarios, etc.), el componente de servicios se desmonta (`v-if`) y, debido a un manejo incorrecto de la reactividad o estados locales redundantes, los datos capturados pero no guardados se pierden.

## Goals / Non-Goals

**Goals:**
- Asegurar que los datos de los servicios persistan íntegramente al cambiar de pestañas sin necesidad de hacer submit al servidor.
- Eliminar cualquier estado local que duplique o clone la información del estado maestro (`useForm`).
- Utilizar `defineModel` para un enlace bidireccional nativo entre el componente padre e hijo.

**Non-Goals:**
- Cambiar el esquema de datos de los servicios en la base de datos.
- Modificar la lógica de persistencia en el backend.
- Cambiar el diseño visual de la sección de servicios (fuera de lo estrictamente necesario para la funcionalidad).

## Decisions

- **Single Source of Truth**: El estado de los servicios residirá exclusivamente en el objeto `form` de Inertia inicializado en `Dashboard.vue`. No se permitirán copias locales en `DoctorServices.vue`.
- **defineModel**: Se utilizará `defineModel` en todos los componentes de la sección del médico para simplificar el `v-model`.
- **Mutación Directa**: Las funciones `addService` y `removeService` operarán directamente sobre el valor del modelo proporcionado por `defineModel`.
- **Uso estricto de v-if**: Se mantendrá el uso de `v-if` para renderizar las pestañas en el componente padre. Al centralizar el estado mediante `defineModel` (Single Source of Truth), los datos persisten en el componente padre incluso cuando el componente hijo se destruye, permitiendo liberar memoria del DOM sin perder información.

## Risks / Trade-offs

- **[Riesgo] Corrupción del estado por referencias circulares**: [Mitigación] Vue 3 maneja bien los proxies; al usar `defineModel`, nos aseguramos de trabajar con la referencia reactiva correcta.
- **[Riesgo] Rendimiento en listas largas**: [Mitigación] Dado que es un formulario de configuración, el número de servicios suele ser pequeño (<20), por lo que la reactividad profunda no impactará negativamente.
