## Requerimientos AGREGADOS

### Requerimiento: Validar tenant_uuid durante el registro
El sistema DEBERÁ validar que se proporcione el `tenant_uuid`, que sea un UUID válido y que exista en la tabla `tenant_invitations`.

#### Escenario: Falta tenant_uuid
- **CUANDO** se envía una solicitud de registro sin `tenant_uuid`
- **ENTONCES** el sistema DEBERÁ devolver un error de validación para el campo `tenant_uuid`

#### Escenario: Formato de tenant_uuid inválido
- **CUANDO** se envía una solicitud de registro con una cadena de UUID inválida para `tenant_uuid`
- **ENTONCES** el sistema DEBERÁ devolver un error de validación para el campo `tenant_uuid`

#### Escenario: tenant_uuid inexistente
- **CUANDO** se envía una solicitud de registro con un `tenant_uuid` que no existe en la tabla `tenant_invitations`
- **ENTONCES** el sistema DEBERÁ devolver un error de validación para el campo `tenant_uuid`

### Requerimiento: Guardar tenant_uuid en el modelo User
El sistema DEBERÁ guardar el `tenant_uuid` proporcionado en el nuevo registro de usuario creado.

#### Escenario: Registro exitoso con tenant_uuid
- **CUANDO** se envía una solicitud de registro válida con un `tenant_uuid` válido
- **ENTONCES** se DEBERÁ crear un nuevo registro de usuario con el `tenant_uuid` especificado

### Requerimiento: Asignación masiva en el modelo User
El modelo `User` DEBERÁ permitir la asignación masiva del atributo `tenant_uuid`.

#### Escenario: Asignación masiva de tenant_uuid
- **CUANDO** se llama a `User::create` con un array que contiene `tenant_uuid`
- **ENTONCES** el valor de `tenant_uuid` DEBERÁ guardarse correctamente en la base de datos
