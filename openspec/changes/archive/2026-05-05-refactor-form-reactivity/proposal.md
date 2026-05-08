## Por qué

El formulario de configuración actual en el Dashboard no recolecta los datos de todos sus componentes hijos debido a la falta de directivas `v-model` y una estructura de estado incompleta. Esto provoca que la información del consultorio y del médico se pierda al intentar guardarla, impidiendo una configuración exitosa del agente.

## Qué cambiará

- **Unificación de Reactividad**: Se reemplazará el uso de `reactive` por `useForm` de Inertia.js en `Dashboard.vue` para gestionar el envío y validación de datos de forma nativa.
- **Flujo de Datos Bidireccional**: Se implementará `defineModel` en todos los componentes de sección (`TimeZoneSection`, `LocationSection`, `FacilitiesSection`) y subcomponentes del médico (`DoctorBilling`, `DoctorPayments`, etc.) para asegurar que los cambios en la interfaz se reflejen en el estado principal.
- **Vinculación Completa de Inputs**: Se añadirán directivas `v-model` a todos los elementos HTML nativos (`<input>`, `<select>`, `<checkbox>`, `<textarea>`) que actualmente carecen de ellas.
- **Inicialización de Estructura**: Se asegurará que el objeto del formulario contenga todas las claves necesarias (`time_zone`, `location`, `facilities`, `doctor`) con sus respectivos sub-objetos inicializados para evitar errores de acceso a propiedades indefinidas.

## Capacidades

### Capacidades Nuevas
- Ninguna.

### Capacidades Modificadas
- `dashboard-ui`: Se formaliza el requisito de recolección íntegra de datos mediante un flujo bidireccional entre el componente raíz y sus subcomponentes modulares.

## Impacto

- **Frontend**: Afecta a `Dashboard.vue` y a toda la jerarquía de componentes de configuración en `resources/js/Pages` y `resources/js/Components`.
- **Integridad de Datos**: Garantiza que el payload enviado al backend contenga la información completa del Tenant y el Médico.
- **Experiencia de Usuario**: Mantiene el diseño visual intacto mientras habilita la funcionalidad de guardado.
