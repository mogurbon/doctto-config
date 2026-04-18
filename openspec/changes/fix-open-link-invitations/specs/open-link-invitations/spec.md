## ADDED Requirements

### Requirement: Creación de Invitación con Solo UUID de Tenant
El sistema DEBE permitir la creación de una invitación proporcionando únicamente un `tenant_uuid` válido y único (si no ha sido usado previamente).

#### Scenario: Creación exitosa con solo tenant_uuid
- **WHEN** se envía una petición POST para crear una invitación con un `tenant_uuid` válido y sin `email` ni `role`
- **THEN** el sistema crea un nuevo registro en `tenant_invitations` con el UUID proporcionado y el campo `email` como nulo.

### Requirement: Soporte para Email Nullable en Invitaciones
El modelo y la base de datos DEBEN permitir que el campo `email` sea nulo en la tabla `tenant_invitations` para soportar el flujo de enlace abierto.

#### Scenario: Almacenamiento de registro con email nulo
- **WHEN** se guarda una invitación sin el campo `email`
- **THEN** la base de datos acepta el registro sin lanzar una violación de restricción "NOT NULL".
