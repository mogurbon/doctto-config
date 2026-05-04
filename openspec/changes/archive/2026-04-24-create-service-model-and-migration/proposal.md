## Why

La aplicación requiere una estructura de datos formal para gestionar los servicios médicos que ofrece el consultorio. Esto permitirá que el agente de IA tenga acceso a información crítica como duración, precios, requisitos de preparación (ayuno, documentos) y limitaciones, facilitando la automatización de la agenda médica.

## What Changes

- Creación del modelo Eloquent `Service` para la gestión centralizada de servicios.
- Creación de la migración de base de datos para la tabla `services` con soporte para UUID y campos detallados de configuración médica.

## Capabilities

### New Capabilities
- `service-definition`: Define la estructura y persistencia de los servicios médicos, incluyendo metadatos de preparación y precios.

### Modified Capabilities
<!-- No se modifican requerimientos existentes en esta fase. -->

## Impact

- **Base de Datos**: Nueva tabla `services`.
- **Backend**: Nuevo modelo `app/Models/Service.php`.
