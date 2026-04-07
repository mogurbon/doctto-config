## Tasks

- [x] Refactor de Dashboard.vue
  - **Archivo a modificar:** `resources/js/Pages/Dashboard.vue`
  - **Acción:** Reemplazar los contenedores actuales aplicando fondos `bg-slate-50`.
  - **Criterio de Aceptación:** Las pestañas de navegación (Citas, Pacientes) deben usar los bordes `gray-200` y el color `cyan-500` en estado activo.

- [x] Estilización de Tarjetas (Modularidad)
  - **Archivos a modificar/crear:** Extraer lógica de tarjetas hacia la carpeta `resources/js/Components/`.
  - **Acción:** Todo contenedor de información debe usar la clase `shadow-sm` y `rounded-lg` para el efecto Stripe.
  - **Criterio de Aceptación:** El archivo Dashboard.vue principal no debe exceder las responsabilidades básicas de layout.

- [x] Verificación de Datos Inertia
  - **Archivo a analizar:** `resources/js/Pages/Dashboard.vue`
  - **Acción:** Respetar el `defineProps` actual de Vue 3. No romper las variables que ya manda el backend.