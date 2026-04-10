# Diseño técnico

## Resumen

Normalizaremos los datos entrantes antes de asignarlos al estado reactivo local del componente Vue.
La función de normalización devolverá un objeto con las claves de los siete días y valores
siempre de tipo arreglo (por defecto `[]`). Además, añadiremos un watcher para mantener el
estado sincronizado si la prop o la fuente de datos cambia después de la inicialización.

## Pseudocódigo y snippets (Vue 3 - Composition API)

Ejemplo de función de normalización (puede incluirse dentro del mismo componente o en util):

```js
function normalizeWeekdays(input = {}) {
  const days = ['lunes','martes','miercoles','jueves','viernes','sabado','domingo'];
  const out = {};
  days.forEach(d => {
    const val = input && Object.prototype.hasOwnProperty.call(input, d) ? input[d] : undefined;
    // Aceptar tanto arreglos ya existentes como convertir estructuras distintas
    out[d] = Array.isArray(val) ? val : [];
  });
  return out;
}
```

Integración en `DoctorSection.vue` (simplificado):

```js
import { reactive, watch } from 'vue';

export default {
  props: {
    serverSchedule: { type: Object, default: () => ({}) },
  },
  setup(props) {
    // Normalizar e inicializar
    const schedule = reactive(normalizeWeekdays(props.serverSchedule));

    // Si la prop cambia, re-normalizar y actualizar el estado manteniendo reactividad
    watch(() => props.serverSchedule, (newVal) => {
      const normalized = normalizeWeekdays(newVal || {});
      Object.keys(normalized).forEach(k => {
        schedule[k] = normalized[k];
      });
    }, { deep: true });

    return { schedule };
  }
}
```

## Consideraciones

- Si el componente usa `ref` en vez de `reactive`, se puede usar `ref(normalizeWeekdays(...))`
  y reemplazar el objeto con `schedule.value = normalized` en el watcher.
- Si la fuente es un arreglo con objetos por día, transformar primero a un mapa por nombre de día.
- Evitar reasignar la referencia completa si se desea mantener propiedades reactivas ya enlazadas
  en la plantilla; preferir mutaciones de propiedades (p.ej., `schedule[k] = ...`).

## Pruebas manuales rápidas

1. Levantar la app frontend (`npm run dev` o `pnpm dev`) y abrir la UI que contiene `DoctorSection`.
2. Navegar por las 7 pestañas y verificar que el botón "Añadir bloque" aparece incluso cuando
   no hay horarios.
3. Probar crear bloques y revisar que se guardan/visualizan correctamente.

## Estructura de Normalización
La función debe asegurar que el objeto de horarios contenga las llaves en español, coincidiendo con los labels de la UI:
`['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo']`.
Cada llave debe inicializarse como `[]` si no existe en la fuente de datos.
