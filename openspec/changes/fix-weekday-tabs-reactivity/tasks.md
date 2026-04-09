# Tasks

- [ ] Tarea 1: Modificar `resources/js/Components/DoctorSection.vue` para utilizar explícitamente Composition API con `<script setup>`. Importar `ref` de 'vue' e inicializar el estado local reactivo con `const activeTab = ref('lunes');`.
- [ ] Tarea 2: Actualizar los botones en el template de `resources/js/Components/DoctorSection.vue` para que utilicen `@click="activeTab = 'dia_correspondiente'"` (ej. 'lunes', 'martes', etc.).
- [ ] Tarea 3: Actualizar el template en `resources/js/Components/DoctorSection.vue` para que la visibilidad de los paneles de contenido de cada día dependa exclusivamente de `v-if="activeTab === 'dia_correspondiente'"`.