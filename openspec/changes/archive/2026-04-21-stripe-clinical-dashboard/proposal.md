# Proposal: Stripe Clinical Dashboard Modularization and Styling

## Why
El actual Dashboard del consultorio médico es una vista monolítica que dificulta el mantenimiento y la escalabilidad. Además, carece de una jerarquía visual clara al no utilizar elevaciones sutiles en sus contenedores, lo que afecta la experiencia de usuario.

## What Changes
- Refactorización de `Dashboard.vue` para extraer componentes atómicos (layout, formularios, paneles de visualización).
- Implementación de la clase de utilidad `shadow-sm` de Tailwind CSS en todos los contenedores y tarjetas del dashboard para mejorar la profundidad visual.
- Asegurar que el componente principal solo actúe como orquestador de los subcomponentes.
