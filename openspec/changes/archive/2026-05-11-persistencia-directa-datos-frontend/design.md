## Context

El proyecto utiliza Laravel con Inertia.js y Vue 3. Para mantener la agilidad en el desarrollo de formularios y configuración del consultorio médico, se requiere un patrón de persistencia que sea rápido de implementar pero seguro. Actualmente, se busca evitar capas de abstracción innecesarias que ralenticen la entrega de prototipos funcionales.

## Goals / Non-Goals

**Goals:**
- Implementar un flujo de persistencia directo y estandarizado.
- Garantizar la seguridad mediante validación estricta en el servidor (Form Requests).
- Reducir el "clutter" en los controladores delegando la validación y confiando en la asignación masiva de Eloquent.

**Non-Goals:**
- Implementar lógica de negocio compleja en servicios o jobs.
- Utilizar eventos o listeners para operaciones CRUD básicas.
- Realizar transformaciones de datos pesadas antes de la persistencia.

## Decisions

### 1. Uso de Form Requests para Validación
Se crearán clases específicas que extiendan de `Illuminate\Foundation\Http\FormRequest`.
- **Razón:** Mantiene el controlador limpio y permite reutilizar reglas de validación.
- **Alternativa:** Validar directamente en el controlador (rechazado por falta de limpieza y escalabilidad).

### 2. Persistencia Directa en el Controlador (Eloquent)
El método `store` o `update` llamará directamente a `Model::create($request->validated())`.
- **Razón:** Máximo minimalismo y adherencia a las reglas del proyecto ("Minimalismo Funcional").
- **Alternativa:** Usar una clase "Action" o "Service" (rechazado para evitar sobreingeniería en este nivel de complejidad).

### 3. Feedback vía Sesión de Laravel
Se utilizarán los métodos `with('success', '...')` en las redirecciones.
- **Razón:** Es la forma idiomática de Inertia para pasar datos flash al frontend.

## Risks / Trade-offs

- **[Riesgo] Engrosamiento de controladores si la lógica crece** → **Mitigación:** Este diseño se aplica estrictamente a persistencia simple. Si surge lógica compleja (ej. integraciones externas), se evaluará la extracción a clases auxiliares en el futuro.
- **[Trade-off] Acoplamiento directo entre controlador y modelo** → **Razón:** Aceptado para ganar velocidad de desarrollo y simplicidad en el mantenimiento de un equipo pequeño.
