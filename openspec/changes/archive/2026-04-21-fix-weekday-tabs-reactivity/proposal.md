## Why
Actualmente, las pestañas de los días de la semana en la configuración de la sección médica (`resources/js/Components/DoctorSection.vue`) no tienen reactividad. La interfaz las renderiza como botones estáticos sin `@click` o clases reactivas. Esto impide a los usuarios cambiar entre los días de la semana de manera visual y lógica, afectando la experiencia de configuración de horarios en el CRM.

## What Changes
- Refactorizar el manejo del estado en `resources/js/Components/DoctorSection.vue` para utilizar explícitamente Composition API con `<script setup>`.
- Implementar una referencia de estado local reactivo (`ref`) para controlar qué pestaña está activa.
- Actualizar el template para renderizar el contenido dinámicamente según la pestaña seleccionada utilizando la directiva `v-if`.

Nota técnica: Es obligatorio sustituir los watchers por propiedades computadas (computed) y usar optional chaining (props.doctor?.hours) para prevenir errores si la data carga de forma asíncrona.