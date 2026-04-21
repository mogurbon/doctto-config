## ADDED Requirements

### Requirement: Modularidad del Dashboard
El componente principal `Dashboard.vue` DEBE construirse de manera estrictamente modular dividiendo layout, formularios y presentaciones en sus propios subcomponentes atómicos.

#### Scenario: Visualización del Dashboard
- **WHEN** un usuario ingresa al Dashboard principal
- **THEN** la pantalla renderiza los subcomponentes aislados en lugar de un único archivo monolítico de gran tamaño.

### Requirement: Uso de Sombras Sutiles
Cualquier contenedor, sección tipo tarjeta o formulario en el layout DEBE tener asignada la clase `shadow-sm` sin excepciones.

#### Scenario: Renderización de Contenedores
- **WHEN** se pinta una card o bloque de configuración en el frontend
- **THEN** se percibe una elevación muy ligera proporcionada por la sombra `shadow-sm`.
