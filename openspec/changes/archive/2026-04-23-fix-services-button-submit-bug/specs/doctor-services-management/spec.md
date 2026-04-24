## ADDED Requirements

### Requirement: Atributo type explícito en botones internos
TODOS los elementos `<button>` utilizados para interactividad interna (agregar ítems, eliminar servicios, expandir acordeón, eliminar elementos de listas) DEBEN incluir explícitamente el atributo `type="button"`. Esto es obligatorio para prevenir que actúen como submit por defecto y recarguen el formulario principal de Inertia.

#### Scenario: Interacción con listas dinámicas
- **WHEN** el usuario hace clic en un botón para agregar un elemento a una lista dinámica
- **THEN** el sistema ejecuta la acción de agregar SIN disparar el evento submit del formulario
