# Technical Design

## Context
Actualmente, el panel del componente `DoctorSection.vue` maneja pestañas empleando la variable `activeTab` o equivalente. El problema de reactividad ocurre porque Vue 3 no está rastreando los cambios de esta variable en las sub-pestañas de los días al no estar declarada con el Composition API adecuadamente.

## Solution
Migraremos el estado de las pestañas a una referencia reactiva explícita de Vue 3, asegurando que las sub-pestañas de días de la semana actualicen correctamente el DOM.

1. **Gestión del Estado:**
   - Importar `ref` explícitamente: `import { ref } from 'vue';`
   - Declarar la variable reactiva: `const activeDay = ref('Lunes');` (el agente deberá ajustar el nombre).

2. **Template:**
   - Actualizar el DOM en eventos de clic: `@click="activeDay = diaSeleccionado"`.