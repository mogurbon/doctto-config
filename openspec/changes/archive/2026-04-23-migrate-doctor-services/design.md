## Context

El componente `DoctorServices.vue` debe gestionar una estructura de datos compleja para el catálogo de servicios de un médico. Actualmente es estático y debe migrarse a un estado funcional que se sincronice con el backend a través de Inertia. 

**Fuente de Verdad**: Toda la estructura de datos, lógica de negocio y mapeo de campos DEBE basarse directamente en el archivo original de referencia: `~/mockup/partials/doctor/services.php`. El componente final en Vue debe ser un espejo funcional de ese archivo PHP, asegurando que cada input y regla de negocio presente en el mockup sea implementada.

## Goals / Non-Goals

**Goals:**
- Implementar un formulario reactivo y dinámico para la gestión de servicios.
- Garantizar la integridad de los datos mediante una inicialización exhaustiva de objetos.
- Proveer una interfaz de usuario limpia y organizada mediante un sistema de acordeón.
- Cumplir estrictamente con los requisitos de negocio para el agendamiento por IA (n8n).

**Non-Goals:**
- No se crearán subcomponentes externos por el momento para mantener la simplicidad del componente autocontenido.
- No se implementará validación de lado del servidor en este paso (se asume manejada por el controlador final).

## Decisions

- **Reactividad Centralizada**: Se utiliza `defineModel` para vincular directamente el estado del componente con el padre, facilitando la integración con formularios de Inertia.
- **Inicialización Defensiva (`createEmptyService`)**: Para evitar errores de `undefined` al acceder a propiedades anidadas en el template (como `fasting.hours` o arrays de links), se implementará una función que genere un objeto con todos los valores por defecto.
- **Estado de UI Local**: El índice del servicio expandido se manejará con una `ref` local (`expandedServiceIndex`) para desacoplar el estado de visualización del estado de los datos.
- **Iteración Basada en Índices**: Para las listas dinámicas (inputs de texto simples dentro de arrays), se usará el índice como `key` y para el `v-model` (`service.includes[i]`), lo cual es seguro en este contexto de formularios dinámicos simples.
- **Estética "Slate/Blue-900"**: Se aplicarán clases de Tailwind como `bg-slate-50`, `text-blue-900`, `border-slate-200` para mantener la coherencia visual del dashboard.

## Risks / Trade-offs

- **[Riesgo] Reactividad en Arrays Profundos** → **[Mitigación]** El uso de `defineModel` y la inicialización completa del objeto aseguran que Vue detecte los cambios en las propiedades anidadas.
- **[Riesgo] Carga de Datos Inicial** → **[Mitigación]** El hook `onMounted` garantizará que `model.value.services` exista antes de renderizar la lista.
- **[Riesgo] Complejidad del Componente** → **[Mitigación]** Aunque sea un componente "fat", se mantendrá organizado con secciones claras en el template y lógica agrupada en el script.
