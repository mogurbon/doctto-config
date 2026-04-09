# Technical Design

## Context
Actualmente, el panel del componente `resources/js/Components/DoctorSection.vue` maneja pestañas empleando variables estáticas. No se especifica correctamente el paradigma, por lo que la IA podría fallar.

## Solution
Migraremos el estado de las pestañas al paradigma de Vue 3 usando Composition API.

1. **Gestión del Estado Local (Composition API):**
   - El componente debe usar `<script setup>`.
   - Se debe importar el método explícitamente: `import { ref } from 'vue';`
   - Se debe inicializar la variable reactiva: `const activeTab = ref('lunes');`

2. **Interacción y Renderizado en el Template:**
   - Botones de pestañas: Deben actualizar el estado usando `@click="activeTab = 'dia_correspondiente'"`.
   - Visibilidad de paneles: El contenido de los horarios de cada día debe estar condicionado usando `v-if="activeTab === 'dia_correspondiente'"`.