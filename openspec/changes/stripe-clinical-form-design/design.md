## Context
El formulario actual requiere una interfaz que inspire máxima confianza y facilidad de uso. El stack actual utiliza Vue 3 + Inertia + Tailwind CSS en un monolito de Laravel. El objetivo es incorporar la "confiabilidad visual de Stripe" combinada con una estética Clínica moderna (fondos `slate-50`, bordes minimalistas `gray-200`, color primario cyan `#0ea5e9`). El formulario se conecta a un webhook de n8n para autocompletar campos; este flujo asíncrono debe reflejarse visualmente a través de estados de carga precisos y pulidos, sin fallar funcionalmente.

## Goals / Non-Goals

**Goals:**
- **Implementar Componentes UI Base:** Crear la estructura de inputs de texto, botones y selectores usando un estilo minimalista (bordes `gray-200`, tipografía `Inter/Geist`, sombras `shadow-sm`).
- **Segmentación de Layout:** Dividir lógicamente los campos en secciones (Paciente, Consulta, Agente) usando márgenes y whitespace generoso (padding/margin utilities).
- **Manejo de Carga asíncrona:** Mostrar feedback visual elegante cuando se envían eventos a n8n (p.ej. loading spinners suaves, skeleton loading para los campos autocompletables).

**Non-Goals:**
- Modificar esquemas de bases de datos o el backend profundo (Laravel/n8n). Únicamente se rediseña la capa de presentación (Vue+Inertia).

## Decisions
- **Tailwind Puro vs UI Frameworks:** Se determina usar **Tailwind CSS puro** sin librerías externas (como Vuetify o Element Plus). Esto asegura un matching visual exacto de la "estética Stripe" sin overrides pesados.
- **Aislamiento de Componentes:** Se crearán componentes de Vue reutilizables y atómicos (ej. `ClinicalInput`, `ClinicalCard`) en lugar de sobrecargar la página de registro.
- **Estructura Formulario:** Se opta por una visualización en una sola página con secciones en tarjetas tipo Stripe o Steps (layout vertical con segmentos claros), que permita scroll fluido o navegación por bloques.

## Risks / Trade-offs
- **Riesgo:** Romper el v-model actual durante la abstracción a componentes `ClinicalInput`.
  - **Mitigación:** Asegurar que los componentes emitan los eventos correctos de Vue 3 (`update:modelValue`) y envuelvan adecuadamente los inputs originales.
- **Riesgo:** Inconsistencias temporales si los datos de n8n tardan en llegar y el usuario cree que no pasó nada.
  - **Mitigación:** Desactivar temporalmente botones o atenuar el resto de secciones mientras la promesa de Axios hacia n8n se resuelve, mostrando feedback visual prominente.
