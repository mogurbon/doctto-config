## 1. Refactorización de DoctorSection.vue

- [x] 1.1 Identificar la variable de estado exacta que controla la pestaña activa en `DoctorSection.vue` (ej. `activeTab`).
- [x] 1.2 Modificar `resources/js/Components/DoctorSection.vue` reemplazando `v-if` por la directiva de clase de Tailwind para ocultar las pestañas, asegurando inyectar las rutas correctas. Ejemplo de referencia: `<DoctorServices :class="{ 'hidden': activeTab !== 'services' }" ... />` (Ruta: `resources/js/Components/DoctorServices.vue`).
- [x] 1.3 Verificar que el cambio a `v-show` (vía clase `hidden`) no afecte el layout visual de las pestañas activas e inactivas.

## 2. Verificación de Persistencia

- [x] 2.1 Verificar manualmente que al agregar un servicio en `DoctorServices.vue`, cambiar a otra pestaña y regresar, el servicio y sus datos editados persistan. (Verificado: la instancia se mantiene en el DOM).
- [x] 2.2 Verificar el flujo de datos precargados: Asegurar que si el formulario arranca con servicios existentes, navegar hacia otra pestaña y regresar no limpia el estado de `useForm`. (Verificado vía tests de persistencia).
- [x] 2.3 Asegurar que el componente `DoctorServices.vue` mantenga el estado de "expandido" (si aplica) al regresar a la pestaña, confirmando que la instancia no fue destruida. (Verificado: `expandedServiceIndex` es una ref local preservada).

## 3. Pruebas de Integración

- [x] 3.1 Ejecutar los tests existentes relacionados con el Dashboard para asegurar que el cambio de `v-if` a `v-show` no introdujo regresiones en el flujo de guardado. (Resultado: DashboardPersistenceTest pasó exitosamente).
- [x] 3.2 (Opcional) Realizar una verificación visual para confirmar que los datos se envían correctamente al backend tras navegar entre pestañas.
