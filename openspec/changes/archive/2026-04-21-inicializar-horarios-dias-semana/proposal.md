# Propuesta: Corregir Reactividad e Inicialización de Estado en las Pestañas de Días de la Semana

## Qué

Este cambio garantiza que el estado reactivo que maneja los horarios semanales en el componente
`DoctorSection.vue` contenga explícitamente las claves de los siete días de la semana
(`lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`) inicializadas como
arreglos vacíos `[]` cuando la fuente de datos (backend/props) no aporte esos días.

## Por qué

Actualmente las pestañas para ciertos días (p. ej. miércoles, jueves, viernes) se muestran
rotas o en blanco porque el objeto de estado no define esas claves. Al acceder a ellas la
plantilla encuentra `undefined` y no renderiza el botón "Añadir bloque" ni la UI esperada.

Normalizar e inicializar el estado previene errores silentes y mantiene la reactividad de Vue.

## Alcance

- Archivos probables a modificar: `resources/js/Components/DoctorSection.vue` (o la ruta donde
  exista dicho componente). Si el proyecto usa otra ruta, usar la que corresponda.
- No se espera cambiar la API del backend. Solo se realizará una normalización en el cliente.

## Resultado esperado

Al alternar entre cualquiera de las 7 pestañas, la UI renderiza consistentemente los bloques
de horario (si existen), o muestra el botón "Añadir bloque" cuando no hay horarios.

## Notas

Si se detecta que el componente usa un patrón distinto (por ejemplo, la lista de días viene
como arreglo en vez de objeto), adaptar la normalización para convertirlo al mapa de días.
