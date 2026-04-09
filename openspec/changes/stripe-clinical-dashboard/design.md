# Technical Design

## Context
Actualmente, el panel del componente `DoctorSection.vue` maneja pestañas empleando la variable `activeTab` o equivalentes, pero las pestañas de los días de la semana no responden correctamente a la interacción del usuario por falta de reactividad estricta.

## Cambios a implementar
**Archivo:** `resources/js/Components/DoctorSection.vue`

1. **Gestión del Estado (Vue 3 Composition API):**
   - Importar `ref` explícitamente al inicio del script: `import { ref } from 'vue';`
   - Declarar la variable que controla el día de la semana como una referencia reactiva. Por ejemplo: `const activeDay = ref('Lunes');` (El agente deberá ajustar esto al nombre de variable real que use el componente).

2. **Interacción en el Template:**
   - Enlazar el evento de clic en los botones de los días para actualizar el valor reactivo: `@click="activeDay = diaSeleccionado"`.
   - Aplicar clases dinámicas para mostrar la pestaña activa dependiendo del valor actual de la variable reactiva.