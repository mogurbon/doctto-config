# Dashboard UI Specification

## Requirement: Modularidad del Dashboard
El componente principal `Dashboard.vue` DEBE construirse de manera estrictamente modular dividiendo layout, formularios y presentaciones en sus propios subcomponentes atómicos.

### Scenario: Visualización del Dashboard
- **WHEN** un usuario ingresa al Dashboard principal
- **THEN** la pantalla renderiza los subcomponentes aislados en lugar de un único archivo monolítico de gran tamaño.

## Requirement: Uso de Sombras Sutiles
Cualquier contenedor, sección tipo tarjeta o formulario en el layout DEBE tener asignada la clase `shadow-sm` sin excepciones.

### Scenario: Renderización de Contenedores
- **WHEN** se pinta una card o bloque de configuración en el frontend
- **THEN** se percibe una elevación muy ligera proporcionada por la sombra `shadow-sm`.

## Requirement: Flujo de Datos Bidireccional Íntegro
El sistema DEBE asegurar una comunicación fluida y reactiva entre el estado global del formulario y los componentes secundarios, garantizando que cualquier cambio en la profundidad del árbol se refleje instantáneamente.

### Scenario: Sincronización
- **WHEN** un usuario modifica un valor en un subcomponente anidado (ej. un campo de horario)
- **THEN** el estado del formulario principal se actualiza automáticamente sin necesidad de eventos manuales complejos.

## Requirement: Gestión de Formulario mediante Inertia
El envío y validación de datos DEBE realizarse utilizando exclusivamente el helper `useForm` de Inertia.js para mantener la coherencia con el backend.

### Scenario: Envío Exitoso
- **WHEN** el usuario hace click en "Guardar" y los datos son válidos
- **THEN** Inertia realiza una petición POST a la ruta `dashboard`, muestra un estado de carga y redirige o actualiza la vista sin recargar la página tras la persistencia exitosa.

### Scenario: Persistencia de Errores
- **WHEN** el servidor devuelve errores de validación (422)
- **THEN** el objeto `form.errors` se puebla automáticamente y los mensajes de error se muestran junto a los inputs correspondientes, incluso en secciones profundas como servicios o horarios.

## Requirement: Inicialización Completa del Esquema de Datos
El formulario DEBE inicializarse con una estructura de datos completa que coincida con el esquema esperado por el backend, evitando errores de "undefined" al acceder a propiedades profundas.

### Scenario: Renderización de Secciones Profundas
- **WHEN** el componente se monta por primera vez
- **THEN** todas las secciones (horarios, servicios, configuración) ya existen en el objeto reactivo, permitiendo el binding inmediato de los inputs.
