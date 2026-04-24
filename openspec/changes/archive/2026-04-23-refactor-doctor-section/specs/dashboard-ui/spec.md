## MODIFIED Requirements

### Requirement: Modularidad del Dashboard
El componente principal `Dashboard.vue` y sus secciones de alto nivel, específicamente `DoctorSection.vue`, DEBEN construirse de manera estrictamente modular dividiendo layout, formularios y presentaciones en sus propios subcomponentes atómicos situados en directorios dedicados.

#### Scenario: Visualización del Dashboard y Secciones
- **WHEN** un usuario ingresa al Dashboard principal o a la sección de configuración del médico
- **THEN** la pantalla renderiza los subcomponentes aislados (como los ubicados en `Components/Doctor/`) en lugar de archivos monolíticos de gran tamaño.

#### Scenario: Uso de Sombras Sutiles
- **WHEN** se pinta una card o bloque de configuración en el frontend, incluyendo los subcomponentes de la sección médica
- **THEN** se percibe una elevación muy ligera proporcionada por la sombra `shadow-sm`.
