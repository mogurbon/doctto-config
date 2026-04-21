# Guía de Estilo y Reglas de Codificación

## Frontend (Vue.js)
- **Cierre de Etiquetas:** TODAS las etiquetas deben cerrarse explícitamente. 
  - Prohibido: `<my-component>` (sin cierre).
  - Obligatorio: `<my-component />` o `<my-component></my-component>`.
- **Formateo:** El código debe ser consistente con la sintaxis SFC (Single File Component).

## Restricciones de Comportamiento
- **No Asunciones:** Si una instrucción es ambigua, el Agente debe preguntar en lugar de adivinar.
- **Fidelidad a la Spec:** No se debe agregar funcionalidad, archivos o dependencias que no estén documentadas en `/specs`.
