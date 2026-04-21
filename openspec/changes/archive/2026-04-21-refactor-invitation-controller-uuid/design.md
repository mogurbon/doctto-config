# Diseño: Refactorización de InvitationController para usar tenant_uuid

## Requerimientos Técnicos
- **Framework**: Laravel 12.
- **Validación**: Uso de la regla `uuid` nativa de Laravel.
- **Modelo**: `App\Models\TenantInvitation` (ya actualizado con `tenant_uuid` y `HasUuids`).

## Cambios en InvitationController

### Método `store`
1. **Validación de entrada**:
   - Cambiar `'tenant_id' => 'required|string|unique:tenant_invitations,tenant_id'` por `'tenant_uuid' => 'required|uuid'`.
   - Nota: La unicidad en `tenant_invitations` para `tenant_uuid` puede no ser necesaria si un tenant puede invitar a múltiples personas, pero la solicitud original mencionaba sustituir `tenant_id`. Sin embargo, dado que ahora tenemos `email` y `role`, la validación debe ser más completa.
   - **Nueva validación sugerida**:
     ```php
     $request->validate([
         'tenant_uuid' => 'required|uuid',
         'email' => 'required|email',
         'role' => 'required|string|in:admin,doctor,receptionist',
     ]);
     ```

2. **Lógica de creación**:
   - Generar un `token` único usando `Str::random(64)`.
   - Establecer `expires_at` (ej. 7 días por defecto).
   - Crear el registro en `tenant_invitations` usando `tenant_uuid`.

### Respuesta
- Devolver el objeto `TenantInvitation` creado con estado 201.

## Consideraciones de Seguridad
- Validar que el `tenant_uuid` exista en la tabla `tenants`.
- Asegurar que el token generado sea suficientemente largo y único.
