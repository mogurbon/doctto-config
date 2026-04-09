# Specification

## MODIFIED
- `resources/js/Components/DoctorSection.vue`

## DESIRED STATE
El componente `resources/js/Components/DoctorSection.vue` opera completamente bajo Vue 3 Composition API con `<script setup>`. 
1. Migrar la variable de estado estático a una variable reactiva local usando `const activeTab = ref('lunes');` dentro de `<script setup>`.
2. Asegurar que los botones de las pestañas utilicen `@click="activeTab = 'dia'"` para actualizar el estado.
3. El contenido de cada pestaña se renderiza condicionalmente dependiendo del estado reactivo usando `v-if`.

## ACCEPTANCE CRITERIA
1. El clic en un día modifica la variable `activeTab` sin recargar la página.
2. Los paneles de horas usan `v-if` u ocultamiento por clases de Tailwind vinculado a `activeTab` para mostrar el día correcto.
3. No hay warnings en consola sobre la inicialización de Vue.