## Por Qué

El sistema fue migrado a una arquitectura multi-tenant utilizando `tenant_uuid`. Actualmente, el `RegisteredUserController` no maneja el `tenant_uuid` durante el proceso de registro, lo que provoca errores de SQL ya que la tabla `users` requiere este campo y no se proporciona un valor por defecto.

## Qué Cambia

- **Actualizar Validación**: Agregar la validación de `tenant_uuid` al método `store` en `RegisteredUserController`.
- **Actualizar Creación de Usuario**: Pasar el `tenant_uuid` desde la solicitud al método `User::create`.
- **Actualizar Modelo**: Asegurar que `tenant_uuid` sea asignable masivamente en el modelo `User`.

## Capacidades

### Nuevas Capacidades
- `tenant-registration`: Maneja el registro de usuarios con asociación obligatoria a un tenant mediante UUID.

### Capacidades Modificadas
- Ninguna.

## Impacto

- `app/Http/Controllers/Auth/RegisteredUserController.php`
- `app/Models/User.php`
- Tabla de base de datos `users` (integridad asegurada al proporcionar los datos requeridos)
