## 1. Preparación de la Estructura

- [x] 1.1 Crear el directorio `resources/js/Components/Doctor/`.

## 2. Creación de Subcomponentes Presentadores

- [x] 2.1 Crear `DoctorProfile.vue` extrayendo el contenido de la pestaña 'profile'.
- [x] 2.2 Crear `DoctorContact.vue` extrayendo el contenido de la pestaña 'contact'.
- [x] 2.3 Crear `DoctorHours.vue` extrayendo el contenido de la pestaña 'hours'.
- [x] 2.4 Crear `DoctorRules.vue` extrayendo el contenido de la pestaña 'rules'.
- [x] 2.5 Crear `DoctorServices.vue` extrayendo el contenido de la pestaña 'services'.
- [x] 2.6 Crear `DoctorPolicies.vue` extrayendo el contenido de la pestaña 'policies'.
- [x] 2.7 Crear `DoctorPayments.vue` extrayendo el contenido de la pestaña 'payments'.
- [x] 2.8 Crear `DoctorBilling.vue` extrayendo el contenido de la pestaña 'billing'.

## 3. Refactorización del Componente Contenedor

- [x] 3.1 Modificar `DoctorSection.vue` para importar los nuevos subcomponentes.
- [x] 3.2 Reemplazar los bloques `v-if` de la plantilla con las llamadas a los subcomponentes usando `v-model`.
- [x] 3.3 Limpiar la plantilla de `DoctorSection.vue` eliminando el código extraído.

## 4. Validación y Pruebas

- [x] 4.1 Verificar que la navegación entre pestañas sigue funcionando correctamente.
- [x] 4.2 Asegurar que la reactividad de los campos se mantiene y los datos se actualizan en el objeto `form` principal.
- [x] 4.3 Ejecutar linting para asegurar consistencia de estilo.
