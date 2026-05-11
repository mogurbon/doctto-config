# Dashboard UI Specification Delta

## MODIFIED Requirements

### Requirement: Gestión de Formulario mediante Inertia
El envío y validación de datos DEBE realizarse utilizando exclusivamente el helper `useForm` de Inertia.js para mantener la coherencia con el backend.

#### Scenario: Envío Exitoso
- **WHEN** el usuario hace click en "Guardar" y los datos son válidos
- **THEN** Inertia realiza una petición POST a la ruta `dashboard`, muestra un estado de carga y redirige o actualiza la vista sin recargar la página tras la persistencia exitosa.

#### Scenario: Persistencia de Errores
- **WHEN** el servidor devuelve errores de validación (422)
- **THEN** el objeto `form.errors` se puebla automáticamente y los mensajes de error se muestran junto a los inputs correspondientes, incluso en secciones profundas como servicios o horarios.
