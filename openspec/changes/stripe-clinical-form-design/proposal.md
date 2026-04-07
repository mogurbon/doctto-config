## Why
El diseño actual del formulario de configuración de agentes necesita transmitir mayor confianza, profesionalismo y limpieza. Inspirarnos en la solidez de herramientas como Stripe, fusionada con una estética "clínica" moderna, resolverá la necesidad de una interfaz que no fatigue al usuario, que ofrezca claridad paso a paso, y que dé la sensación de seguridad que se requiere para una plataforma médica como Doctto.

## What Changes
- Renovación visual completa del formulario de configuración de agente en Vue/Inertia utilizando Tailwind CSS puro.
- Implementación de un layout segmentado (Paciente, Consulta, Agente) para mejor distribución cognitiva.
- Adopción de una paleta de colores "clínica": fondos `slate-50`, detalles en cyan clínico (`#0ea5e9`) y tipografía Sans-serif limpia (Inter/Geist).
- Actualización de inputs a un estilo minimalista: bordes `gray-200`, sombras ligeras `shadow-sm`, y generoso espacio en blanco.
- No se introducen cambios funcionales. El flujo con n8n y Laravel se mantiene intacto.

## Capabilities

### New Capabilities
- `clinical-form-ui`: Define las especificaciones visuales, componentes base, paleta de colores y layout segmentado para el formulario.

### Modified Capabilities


## Impact
- **Frontend (Vue/Inertia)**: Componentes visuales del formulario.
- **Funcionalidad**: Cero impacto en el backend (Laravel) o flujos de automatización (n8n). Únicamente se altera la presentación HTML/CSS.
