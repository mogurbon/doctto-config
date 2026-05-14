## ADDED Requirements

### Requirement: Persistencia de Estado entre Pestañas
El sistema DEBE garantizar que los datos introducidos en los componentes de pestañas se preserven íntegramente al navegar entre ellas durante una misma sesión de edición.

#### Scenario: Cambio de pestaña sin pérdida de datos
- **WHEN** el usuario introduce datos en la pestaña "Servicios", navega a la pestaña "Perfil" y regresa a "Servicios"
- **THEN** los datos previamente introducidos permanecen visibles y editables en el componente.

#### Scenario: Preservación de datos precargados
- **WHEN** el componente se monta con datos iniciales (precargados) y el usuario navega entre pestañas
- **THEN** los datos originales y cualquier modificación parcial se conservan sin reseteos al volver a la pestaña.

### Requirement: Renderización No Destructiva de Secciones
Los componentes que representan secciones o pestañas del formulario DEBEN permanecer en el DOM (u ocultarse mediante CSS) en lugar de ser destruidos y remontados al cambiar la vista activa.

#### Scenario: Preservación del estado local del componente
- **WHEN** se alterna entre diferentes secciones del formulario del médico
- **THEN** los componentes hijos no ejecutan el ciclo de vida `unmount`/`mount`, manteniendo sus estados internos y referencias a datos reactivos.
