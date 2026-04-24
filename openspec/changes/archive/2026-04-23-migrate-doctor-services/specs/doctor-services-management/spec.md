## ADDED Requirements

### Requirement: Cumplimiento del Mockup de Referencia
El sistema DEBE replicar exactamente la estructura de campos, lógica de negocio y comportamiento definidos en `~/mockup/partials/doctor/services.php`. Cualquier desviación del mapeo funcional del original se considerará un fallo de implementación.

#### Scenario: Validación de campos contra mockup
- **WHEN** el desarrollador implementa el formulario
- **THEN** el sistema contiene todos los campos (categoría, duración, tipo de precio, ayuno, etc.) y listas dinámicas presentes en el archivo PHP original.

### Requirement: Inicialización de datos de servicios
El sistema DEBE inicializar la lista de servicios como un array vacío si no existe al cargar el componente, y DEBE proveer una estructura completa por defecto para cada nuevo servicio creado con los siguientes límites y valores permitidos extraídos del mockup:

- **Categoría (`category`)**: DEBE ser uno de `['consulta', 'estudio', 'procedimiento', 'otro']`.
- **Duración (`duration`)**: Input numérico con `min="5"`, `max="480"`, `step="5"`.
- **Tipo de Precio (`pricing_type`)**: DEBE ser uno de `['fixed', 'quote']`.
- **Precio (`price`)**: Input numérico con `min="0"`, `step="50"`.
- **Ayuno (`fasting.hours`)**: Input numérico con `min="1"`, `max="24"`, `step="1"` (solo visible si `fasting.required` es `true`).
- **Llegar antes (`arrival_minutes`)**: Input numérico con `min="0"`, `max="120"`, `step="5"`.
- **Listas Dinámicas**: Se DEBEN implementar exactamente las listas `includes`, `docs` (Documentos), `stop_meds` (Medicamentos a suspender) y `links`.

#### Scenario: Carga inicial sin datos
- **WHEN** el componente se monta y `model.value.services` es indefinido
- **THEN** el sistema inicializa `model.value.services` como un array vacío `[]`

#### Scenario: Creación de nuevo servicio
- **WHEN** el usuario hace clic en "Agregar servicio"
- **THEN** el sistema inserta un objeto de servicio con todos los campos inicializados por defecto (name, category, duration, pricing_type, price, locked, bookable, description, notes, includes[], documents[], meds_to_stop[], links[], fasting, arrival_minutes)

### Requirement: Gestión dinámica de atributos de servicio
El sistema DEBE permitir la edición de todos los atributos de un servicio y la gestión de listas dinámicas (requisitos, documentos, etc.) mediante enlaces bidireccionales reactivos.

#### Scenario: Edición de campos de texto y selección
- **WHEN** el usuario modifica el nombre o la categoría de un servicio
- **THEN** los cambios se reflejan inmediatamente en el objeto `model`

#### Scenario: Gestión de listas dinámicas
- **WHEN** el usuario agrega o elimina un elemento de "Incluye", "Documentos", "Medicamentos" o "Links"
- **THEN** el array correspondiente dentro del objeto del servicio se actualiza mediante `push` o `splice`

### Requirement: Lógica de negocio de precios y bloqueos
El sistema DEBE aplicar reglas condicionales para la visualización de campos de precio y la capacidad de eliminar servicios según su estado de bloqueo.

#### Scenario: Cambio de tipo de precio
- **WHEN** el usuario cambia `pricing_type` de 'fixed' a 'quote'
- **THEN** el sistema oculta el input de precio numérico y muestra un textarea para notas de cotización

#### Scenario: Restricción de eliminación
- **WHEN** un servicio tiene la propiedad `locked` establecida en `true`
- **THEN** el botón de eliminar para ese servicio DEBE estar deshabilitado o no ser visible para el usuario

### Requirement: Control de navegación (Acordeón)
El sistema DEBE permitir expandir solo un formulario de edición de servicio a la vez para mantener el orden visual.

#### Scenario: Expandir servicio para edición
- **WHEN** el usuario hace clic en "Editar" en un servicio de la lista
- **THEN** el sistema expande el formulario de ese servicio y contrae cualquier otro que estuviera abierto
