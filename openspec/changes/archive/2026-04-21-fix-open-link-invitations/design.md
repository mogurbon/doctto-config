## Context

Actualmente, la tabla `tenant_invitations` exige valores no nulos para `email`, `role`, `token` y `expires_at`. Sin embargo, el flujo de "Invitaciones de Enlace Abierto" requiere que el sistema externo pueda crear una invitación proporcionando únicamente el `tenant_uuid`. Al intentar crear una invitación sin estos campos, la base de datos lanza un error `NOT NULL violation`.

## Goals / Non-Goals

**Goals:**
- Hacer que las columnas `email`, `role`, `token` y `expires_at` sean `nullable` en la tabla `tenant_invitations`.
- Asegurar que `InvitationController@store` solo valide y almacene el `tenant_uuid`.

**Non-Goals:**
- No modificar el `RegisteredUserController`.
- No automatizar la generación de tokens o expiraciones si no vienen en la petición (se asume que para enlaces abiertos no son críticos por ahora).

## Decisions

- **Nueva Migración**: Crear una migración que utilice `->nullable()->change()` para las columnas afectadas. Se usará el paquete `doctrine/dbal` (o la funcionalidad nativa de Laravel 10/11+) para modificar las columnas.
- **Refactorización Quirúrgica**: Limpiar el `InvitationController` de cualquier rastro de validación de `email` o `role` que pudiera haber quedado (según reporte del usuario, aunque el estado actual ya parece simplificado, se verificará).

## Risks / Trade-offs

- **[Riesgo] Marcado de Invitación como Usada** → El `RegisteredUserController` actual busca la invitación por `tenant_uuid` Y `email`. Si la invitación se creó sin `email`, la búsqueda fallará y la invitación permanecerá marcada como `is_used = false`.
  - *Mitigación*: Se respeta la instrucción de "NO tocar el RegisteredUserController", dejando este desajuste como una deuda técnica conocida o para ser resuelta en una fase posterior cuando se defina cómo vincular el email del registro con la invitación abierta.
- **[Riesgo] Unicidad de Token** → Si se crean múltiples invitaciones con `token` nulo, la restricción de unicidad (`unique`) podría ser un problema dependiendo del motor de DB.
  - *Mitigación*: En PostgreSQL (usado en este proyecto), múltiples valores `NULL` no violan la restricción `UNIQUE`.
