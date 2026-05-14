# Especificación: Reactividad de Servicios del Doctor

## Requerimientos

### Persistencia de Estado de Servicios
El componente `DoctorServices.vue` DEBE mantener la integridad de los datos de servicios agregados o modificados incluso si el componente es desmontado del DOM (por ejemplo, al cambiar de pestaña).

#### Escenario: Cambio de pestaña sin pérdida de datos
- **CUANDO** el usuario agrega un servicio y completa su nombre en la pestaña "Servicios".
- **Y** el usuario cambia a la pestaña "Perfil".
- **Y** el usuario regresa a la pestaña "Servicios".
- **ENTONCES** el servicio agregado anteriormente DEBE aparecer con el nombre capturado.

#### Estructura de Datos: Objeto de Servicio
Cada objeto dentro de la colección services DEBE tener mapeados correctamente los campos esperados por la base de datos (por ejemplo: name, category, duration, pricing_type, price, currency).

### Uso de defineModel para Servicios
El componente `DoctorServices.vue` DEBE utilizar la macro `defineModel` de Vue 3 para enlazar la colección de servicios directamente con el estado del formulario en el componente padre.

#### Escenario: Sincronización automática
- **CUANDO** se modifica un campo de un servicio dentro de `DoctorServices.vue`.
- **ENTONCES** el estado del formulario en `Dashboard.vue` DEBE actualizarse instantáneamente sin necesidad de disparar eventos manuales.

### Gestión de Formulario mediante Inertia
El envío y validación de datos DEBE realizarse utilizando exclusivamente el helper `useForm` de Inertia.js para mantener la coherencia con el backend.

#### Escenario: Envío Exitoso
- **CUANDO** el usuario hace click en "Guardar" y los datos son válidos
- **ENTONCES** Inertia realiza una petición POST, muestra un estado de carga y redirige o actualiza la vista sin recargar la página tras la persistencia exitosa.

#### Escenario: Persistencia de Errores
- **CUANDO** el servidor devuelve errores de validación (422)
- **ENTONCES** el objeto `form.errors` se puebla automáticamente y los mensajes de error se muestran junto a los inputs correspondientes, incluso en secciones profundas como servicios o horarios.
