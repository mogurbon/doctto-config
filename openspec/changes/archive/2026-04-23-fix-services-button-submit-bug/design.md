## Context

En HTML, el comportamiento por defecto de un elemento `<button>` dentro de un `<form>` es actuar como un botón de envío (`type="submit"`). En el componente `DoctorServices.vue`, muchos botones se utilizan para manipular el estado de las listas dinámicas sin la intención de enviar el formulario principal, lo que causa fallos en la lógica de usuario.

## Goals / Non-Goals

**Goals:**
- Asegurar que todos los botones de interactividad interna tengan `type="button"` explícito.
- Eliminar cualquier efecto secundario de envío de formulario involuntario.

**Non-Goals:**
- No se modificará la estructura de datos del componente.
- No se agregarán nuevos campos ni funcionalidades adicionales.

## Decisions

- **Uso Estricto de Atributos**: Se decide que ningún botón dentro del componente (excepto quizás el de guardado final, si existiera) debe omitir el atributo `type`. Esto elimina la ambigüedad del comportamiento por defecto del navegador.
- **Auditoría Manual del Template**: Dado que el componente es autocontenido y pequeño, una auditoría visual y manual del template de Vue es el método más efectivo y seguro.

## Risks / Trade-offs

- **[Riesgo] Omisión de algún botón** → **[Mitigación]** Revisar sistemáticamente todas las etiquetas `<button>` usando la función de búsqueda del editor.
