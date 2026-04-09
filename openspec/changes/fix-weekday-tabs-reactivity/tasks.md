## 1. UI Reactivity

- [ ] 1.1 T-01: Identificar y auditar el componente afectado (`DoctorSection.vue`). Validar dónde se requiere el estado reactivo.
- [ ] 1.2 T-02: Implementar/corregir el estado reactivo y el evento onClick. Añadir `const selectedDay = ref('lunes')` o arreglo similar, y asignar `@click` en la vista.
- [ ] 1.3 T-03: Actualizar el template vinculando las clases de Tailwind de forma dinámica. Enlazar `:class` a `selectedDay` aplicando `border-cyan-500` a las activas.
- [ ] 1.4 T-04: Actualizar la especificación base del comportamiento de la UI de navegación comprobando que las pestañas respondan sin interferir con Inertia (ya contemplado en el design).
