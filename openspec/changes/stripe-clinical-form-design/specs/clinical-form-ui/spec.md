## ADDED Requirements

### Requirement: Layout Base Segmentado
El formulario DEBE presentar una estructura con un fondo neutro elegante (`slate-50`) que albergue contenedores (cards) divididos en partes lógicas: Paciente, Consulta y Agente.

#### Scenario: Visualización Inicial del Formulario
- **WHEN** el usuario accede a la vista de configuración del agente
- **THEN** la pantalla renderiza un layout claro con tarjetas de contenido separadas para cada dominio.

### Requirement: Inputs Minimalistas tipo Stripe
Todos los campos de texto, selectores y contenedores del formulario DEBEN estar construidos con Tailwind utilizando bordes `gray-200`, `shadow-sm` y tipografía `Inter` o `Geist`.

#### Scenario: Focus en un campo de texto
- **WHEN** el usuario interactúa (focus) en un campo de texto
- **THEN** el input muestra un anillo (ring) sutil alineado a la paleta, manteniéndose limpio y profesional.

### Requirement: Estados de Carga (Loading States)
El frontend DEBE proveer feedback visual elegante (e.g. spinners en los botones, atenuamiento) mientras aguarda la respuesta del webhook de n8n.

#### Scenario: Petición de Autocompletado desde n8n
- **WHEN** el frontend despacha el evento al webhook de n8n
- **THEN** se muestra un estado de carga en el formulario (skeleton loading o spinners) mientras se espera la sugerencia JSON.
