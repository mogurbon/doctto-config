## 1. Auditoría y Preparación

- [x] 1.1 Identificar todos los subcomponentes de configuración en `resources/js/Components/` para asegurar cobertura total.
- [x] 1.2 Revisar la estructura de datos esperada en el controlador de backend para alinear la inicialización del formulario.

## 2. Refactorización de Dashboard.vue

- [x] 2.1 Reemplazar `reactive` por `useForm` de `@inertiajs/vue3` para la gestión del estado del formulario.
- [x] 2.2 Definir el esquema completo inicial del formulario con todos los objetos anidados requeridos.
- [x] 2.3 Crear el método `submitForm` que ejecute el envío POST mediante Inertia.
- [x] 2.4 Vincular los componentes `TimeZoneSection`, `LocationSection` y `FacilitiesSection` usando `v-model`.

## 3. Refactorización de Secciones Base (Tenant)

- [x] 3.1 Actualizar `TimeZoneSection.vue` para usar `defineModel()` y vincular su select nativo.
- [x] 3.2 Actualizar `LocationSection.vue` para usar `defineModel()` y vincular todos sus inputs de dirección y contacto.
- [x] 3.3 Actualizar `FacilitiesSection.vue` para usar `defineModel()` y vincular checkboxes y textareas de instalaciones.

## 4. Refactorización de DoctorSection.vue

- [x] 4.1 Implementar `defineModel()` en `DoctorSection.vue` para recibir y emitir el estado del médico.
- [x] 4.2 Ajustar la lógica de `ensureFormStructure` para garantizar que todos los sub-objetos del médico estén inicializados.
- [x] 4.3 Actualizar el template para delegar la reactividad a los subcomponentes del médico mediante `v-model`.

## 5. Refactorización de Subcomponentes del Médico (Restaurados)

- [x] 5.1 Restaurar y vincular inputs en `DoctorProfile.vue`.
- [x] 5.2 Restaurar y vincular inputs en `DoctorRules.vue`.
- [x] 5.3 Restaurar y vincular inputs en `DoctorServices.vue`.
- [x] 5.4 Restaurar inputs numéricos y vincular en `DoctorPolicies.vue`.
- [x] 5.5 Restaurar regla de cobro y vincular en `DoctorPayments.vue`.
- [x] 5.6 Restaurar inputs de correo y horas y vincular en `DoctorBilling.vue`.

## 6. Validación y Limpieza

- [x] 6.1 Verificar la integridad del objeto `form` mediante inspección manual en el componente `Dashboard.vue`.
- [x] 6.2 Asegurar que no se hayan alterado las clases de Tailwind CSS ni la estructura visual original.
- [x] 6.3 Ejecutar el formateador de código para asegurar consistencia estilística.
