# Diseño: Refactorización de Arquitectura Tenant y Workspace Settings

## Requerimientos Técnicos
- **Framework**: Laravel 12.
- **Base de Datos**: PostgreSQL (requerido para soporte nativo de tipos `UUID` y `JSONB`).
- **UUIDs**: Todos los UUIDs generados deben ser de la versión **UUID v7** (el estándar por defecto en Laravel 12) para optimizar la indexación y evitar la fragmentación en PostgreSQL.
- **Traits de Modelos**: Todos los modelos que utilicen UUIDs como identificadores primarios o que deban generar UUIDs automáticamente deben implementar el trait `Illuminate\Database\Eloquent\Concerns\HasUuids`.

## Estrategia de Base de Datos

### 1. Migración a UUID
Para asegurar la integridad de los datos durante la transición:
- Se agregará la columna `tenant_uuid` de tipo `UUID` (nullable inicialmente) en `users` y `tenant_invitations`.
- Se creará un comando/script para poblar `tenant_uuid` basado en los registros existentes.
- Una vez poblados, se cambiará a `NOT NULL`.
- Se eliminará la columna antigua `tenant_id` y se renombrará la nueva o se ajustarán las relaciones.

### 2. Tabla `tenant_invitations` (Modificada)
Campos adicionales:
- `email`: string (correo del invitado).
- `role`: string (admin, doctor, receptionist).
- `token`: string (único, para la URL de aceptación).
- `expires_at`: timestamp (validez de la invitación).

### 3. Tabla `workspace_settings` (Nueva)
Relación 1:1 con el Tenant a través de `tenant_uuid`.
- `id`: uuid (PK).
- `tenant_uuid`: uuid (FK, unique).
- `agenda_rules`: jsonb.
  - Default: `{"min_notice_hours": 24, "max_ahead_days": 30, "cancel_limit_hours": 12, "arrival_grace_minutes": 15}`.
- `billing_info`: jsonb.
  - Estructura: `billing_email`, `tax_regime_code`, `payment_rule`, `accepted_payment_methods`.
- `onboarding_completed`: boolean (default false).
- `timestamps`.

## Arquitectura de Modelos

### User / TenantInvitation
- Implementar el trait `HasUuids` si es necesario para el manejo de sus propios IDs o de `tenant_uuid`.
- Actualizar el casteo de atributos si es necesario.
- Asegurar que las consultas apunten a la nueva columna UUID.

### WorkspaceSetting (Nuevo)
- Implementar el trait `HasUuids`.
- Implementar `casts()` para los campos JSONB (`agenda_rules`, `billing_info`).
- Relación `belongsTo` con el Tenant.

## Seguridad
- El `token` de invitación debe ser generado aleatoriamente (ej. `Str::random(64)`).
- Validar `expires_at` en el controlador de aceptación de invitaciones.
