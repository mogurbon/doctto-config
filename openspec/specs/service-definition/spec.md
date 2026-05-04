# Service Definition Specification

## Requirement: Persistencia de Servicios Médicos
El sistema DEBE permitir el almacenamiento de servicios médicos con una estructura que soporte identificadores únicos (UUID) tanto para el servicio como para su relación con el consultorio (tenant_uuid) y, opcionalmente, con un médico específico (doctor_id).

### Scenario: Creación exitosa de un servicio básico
- **WHEN** se intenta guardar un servicio con nombre, duración y tenant_uuid válidos.
- **THEN** el sistema persiste el registro con un UUID generado automáticamente.

## Requirement: Configuración de Preparación y Requisitos
El sistema DEBE permitir definir instrucciones detalladas de preparación previa para el paciente, incluyendo ayuno, documentos requeridos y medicamentos a suspender.

### Scenario: Registro de instrucciones de preparación
- **WHEN** se definen campos como `requires_fasting`, `required_documents` y `medications_to_suspend`.
- **THEN** el sistema almacena estos valores asegurando que las listas se guarden en formato JSON.

## Requirement: Gestión de Precios y Bloqueos
El sistema DEBE permitir configurar el tipo de precio (fijo o por cotización), el monto del servicio y si el servicio se encuentra bloqueado para agendamiento.

### Scenario: Configuración de precio fijo
- **WHEN** se establece `pricing_type` como 'fixed' y se asigna un valor a `price`.
- **THEN** el sistema persiste el precio con una precisión de dos decimales.

### Scenario: Configuración de precio por cotización con exclusividad
- **WHEN** se establece `pricing_type` como 'quote' (cotización).
- **THEN** el sistema debe permitir guardar `quote_notes` y asegurar que el campo `price` quede nulo, manteniendo la exclusividad entre ambos tipos de cobro.
