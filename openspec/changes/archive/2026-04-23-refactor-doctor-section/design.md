## Context

El componente `DoctorSection.vue` contiene actualmente toda la lógica de validación de estructura (`ensureFormStructure`, `ensureWeekdaysOnForm`) y la interfaz de usuario de ocho secciones distintas. Esto genera un archivo extenso y difícil de navegar.

## Goals / Non-Goals

**Goals:**
- Descomponer `DoctorSection.vue` en componentes atómicos.
- Mantener la integridad de los datos y la reactividad.
- Centralizar la lógica de inicialización del estado en el componente padre.

**Non-Goals:**
- Agregar nuevos campos o validaciones.
- Cambiar los estilos o el diseño visual.
- Integrar lógica de API o servicios externos.

## Decisions

### 1. Estructura de Componentes
Se crearán subcomponentes en `resources/js/Components/Doctor/` siguiendo la nomenclatura `Doctor<NombreSeccion>.vue`.
- **Razón**: Mejora la organización y facilita la localización de componentes relacionados con la sección médica.

### 2. Comunicación mediante v-model
Cada subcomponente recibirá una parte del objeto `form` mediante `v-model`. Por ejemplo: `<DoctorProfile v-model="form.profile" />`.
- **Razón**: Es el estándar en Vue 3 para componentes de formulario, permitiendo una reactividad limpia y bidireccional sin necesidad de emitir eventos manuales complejos.

### 3. Persistencia de la Lógica de Normalización en el Padre
Las funciones `ensureFormStructure`, `normalizeWeekdays` y `ensureWeekdaysOnForm` permanecerán en `DoctorSection.vue`.
- **Razón**: El componente padre es responsable de garantizar que el contrato de datos sea válido antes de pasarlo a los hijos, actuando como "single source of truth".

### 4. Manejo de Pestañas
El estado `activeTab` permanecerá en `DoctorSection.vue` para controlar la visibilidad de los hijos.
- **Razón**: Permite mantener el componente padre como el orquestador de la navegación.

## Risks / Trade-offs

- **[Riesgo] Pérdida de Reactividad**: Al pasar subobjetos (`form.profile`) por `v-model`, es crítico asegurar que el objeto no se pierda en el hijo.
  - **Mitigación**: Usar `v-model` directamente sobre el objeto recibido en el hijo o desestructurarlo cuidadosamente.
- **[Riesgo] Complejidad de Archivos**: Pasar de 1 archivo a 9 archivos.
  - **Mitigación**: Organización en un directorio dedicado `Doctor/` para mantener el árbol de componentes limpio.
