# Tareas: Refactorización de InvitationController para usar tenant_uuid

## Fase 1: Modificación del Controlador

- [ ] Actualizar el método `store` en `app/Http/Controllers/InvitationController.php`:
    - Cambiar la validación de `tenant_id` a `tenant_uuid`.
    - Agregar validaciones para `email` y `role`.
    - Implementar la lógica de creación incluyendo `token` y `expires_at`.

## Fase 2: Pruebas y Validación

- [ ] Crear o actualizar tests en `tests/Feature/InvitationControllerTest.php` (o similar) para verificar:
    - Validación exitosa con `tenant_uuid`.
    - Error de validación con UUID inválido o inexistente.
    - Persistencia correcta de todos los campos en la tabla `tenant_invitations`.
    - Respuesta JSON correcta con código 201.
