## Context

El sistema requiere una entidad `Service` para representar los diversos servicios médicos (consultas, estudios, procedimientos) que un consultorio puede ofrecer. Esta entidad es fundamental para el funcionamiento del agente de IA, ya que contiene las reglas de negocio, precios y requisitos previos para cada tipo de cita.

## Goals / Non-Goals

**Goals:**
- Implementar el modelo `Service` con soporte nativo para UUIDs como llave primaria.
- Crear una migración robusta que cubra todos los aspectos operativos, financieros y de preparación del servicio.
- Asegurar que el modelo utilice el método `casts()` para manejar correctamente los tipos de datos JSON, booleanos y decimales.
- Mantener la consistencia con el esquema de multi-tenancy usando `tenant_uuid`.

**Non-Goals:**
- No se realizarán cambios en controladores existentes ni se crearán nuevos.
- No se definirán rutas de API o Web.
- No se modificará el frontend (Vue) en esta fase.

## Decisions

- **Llave Primaria UUID**: Se utilizará el trait `Illuminate\Database\Eloquent\Concerns\HasUuids` para que el modelo gestione automáticamente los UUIDs de la columna `id`.
- **Relación con Tenant**: Se utilizará `tenant_uuid` como columna de indexación para filtrar servicios por consultorio, siguiendo el patrón de `WorkspaceSetting`.
- **Campos JSON**: Columnas como `includes`, `required_documents`, `medications_to_suspend` y `useful_links` se definirán como tipo `json` en la migración y se castearán como `array` en el modelo para facilitar su manipulación en PHP.
- **Precisión Decimal**: El campo `price` utilizará `decimal(10, 2)` para evitar problemas de precisión aritmética comunes en tipos flotantes.
- **Configuración de Preparación**: Se incluyen campos específicos como `requires_fasting` y `arrive_minutes_before` para automatizar las instrucciones que el agente de IA envía a los pacientes.
- **Relación con Doctor**: El campo doctor_id será un uuid nullable con índice, para permitir la asociación opcional con el médico, manteniendo la consistencia con el uso de UUIDs del sistema.

## Risks / Trade-offs

- **[Riesgo] Complejidad en Consultas**: Al tener muchos campos JSON, las búsquedas complejas dentro de estos campos pueden ser costosas en base de datos.
  - **Mitigación**: Estos campos se utilizarán principalmente para lectura y despliegue de información, no para filtrado complejo.
- **[Riesgo] Integridad con Doctors**: El campo `doctor_id` es opcional (nullable). Se debe asegurar que la lógica de negocio maneje correctamente servicios generales del consultorio vs servicios específicos de un médico.
