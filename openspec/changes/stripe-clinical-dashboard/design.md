## Context
Es necesario definir la estética visual exacta del concepto "Stripe-Clinical" para el Dashboard principal.

## Goals / Non-Goals

**Goals:**
- **Tailwind:** Todo el diseño será ejecutado usando clases utilitarias core de Tailwind CSS.
- **Paleta de Colores:** Integrar de forma preponderante el uso del primario `cyan-500` (`#0ea5e9`).
- **Fondos:** Uniformar las superficies globales de fondo usando `slate-50`.
- **Bordes:** Todos los delineados, separadores y campos deben ser definidos usando `gray-200`.

**Non-Goals:**
- No utilizaremos librerías externas de UI de terceros.
- No alteraremos las interacciones con APIs y backend (n8n).

## Decisions
- Construir el diseño basándose estrictamente en las directrices numéricas de Tailwind (colores al 500 para interacciones primarias, 50 para fondos) para garantizar alta fidelidad con el concepto de limpieza médica.

## Risks / Trade-offs
- [Riesgo] Contraste pobre entre cyan-500 y texto blanco/claro. → Mitigación: Uso exclusivo de cyan-500 para elementos primarios grandes o fondos oscuros para el texto interior si es necesario.
