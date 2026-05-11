# Dashboard Direct Persistence Specification

## ADDED Requirements

### Requirement: Validación Integral del Payload del Dashboard
El sistema SHALL validar mediante un Form Request especializado (`SaveAgentConfigRequest`) que toda la estructura anidada del formulario (perfil, ubicación, servicios, horarios, reglas y facturación) cumple con los tipos de datos y restricciones de negocio establecidos.

#### Scenario: Validación fallida por datos incompletos
- **WHEN** se envía un payload con el campo `doctor.profile.name` vacío o servicios con duración negativa
- **THEN** el sistema devuelve un error 422 con mensajes detallados para cada campo inválido.

#### Scenario: Validación exitosa de payload completo
- **WHEN** se envía el payload con todos los campos requeridos (nombre, zona horaria, dirección, al menos un servicio y horarios válidos)
- **THEN** el sistema permite el paso a la capa de persistencia.

### Requirement: Persistencia Transaccional de Configuración
El sistema SHALL persistir la información en múltiples tablas (`users`, `services`, `workspace_settings`) dentro de una transacción de base de datos para asegurar la integridad atómica.

#### Scenario: Error durante la persistencia de servicios
- **WHEN** ocurre un error inesperado al guardar la lista de servicios después de haber actualizado el perfil del médico
- **THEN** el sistema realiza un rollback completo y no guarda ningún cambio parcial en la base de datos.

### Requirement: Sincronización de Servicios (Sync Pattern)
El sistema SHALL actualizar la lista de servicios del médico eliminando los registros previos del tenant y creando los nuevos definidos en el payload del dashboard.

#### Scenario: Actualización de lista de servicios
- **WHEN** el médico añade un nuevo servicio y elimina uno existente en el frontend y presiona "Guardar"
- **THEN** la base de datos refleja únicamente el nuevo set de servicios configurado.

### Requirement: Almacenamiento de Reglas en WorkspaceSettings
El sistema SHALL transformar y almacenar las secciones de disponibilidad, políticas de cancelación, métodos de pago y reglas de facturación en las columnas JSONB `agenda_rules` y `billing_info` del modelo `WorkspaceSetting`.

#### Scenario: Persistencia de reglas de agendamiento
- **WHEN** el usuario configura una tolerancia de arribo de 15 minutos y 2 horas de aviso mínimo
- **THEN** estos valores se almacenan correctamente dentro del objeto JSONB en la columna `agenda_rules`.
