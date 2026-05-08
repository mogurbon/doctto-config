# Estructura de Datos - Configuración del Consultorio (DOCTTO)

Este documento detalla los campos capturados en el formulario de configuración inicial y su mapeo sugerido para la base de datos.

## 1. Información General del Consultorio/Práctica
| Campo | Tipo de Dato | Descripción |
| :--- | :--- | :--- |
| `practice_type` | `string` (enum) | Tipo de práctica: `solo_practice` (individual) o `clinic_multi_staff` (clínica). |
| `clinic_brand_name` | `string` (null) | Nombre comercial de la clínica (opcional). |
| `time_zone` | `string` | Zona horaria para la gestión de citas y recordatorios (ej: `America/Mexico_City`). |

## 2. Ubicación e Instalaciones (`locations`)
| Campo | Tipo de Dato | Descripción |
| :--- | :--- | :--- |
| `location_name` | `string` | Nombre descriptivo del lugar (ej: Plaza Galerías). |
| `address_full` | `text` | Dirección física completa del consultorio. |
| `arrival_references` | `text` (null) | Referencias visuales para que el paciente localice el lugar. |
| `map_url` | `string` (null) | Enlace a Google Maps para compartir vía WhatsApp. |
| `parking_available` | `boolean` | Indica si el lugar cuenta con estacionamiento. |
| `accessibility_features` | `json` | Array de características de accesibilidad (silla de ruedas, elevador, etc.). |
| `has_waiting_room` | `boolean` | Indica si el consultorio tiene sala de espera. |
| `waiting_room_capacity`| `integer` | Capacidad máxima de personas en la sala de espera. |
| `facility_notes` | `text` | Observaciones adicionales sobre las instalaciones. |

## 3. Perfil y Contacto del Médico (`doctors`)
| Campo | Tipo de Dato | Descripción |
| :--- | :--- | :--- |
| `name` | `string` | Nombre completo del médico. |
| `specialty` | `string` | Especialidad médica principal. |
| `age_min` | `integer` | Edad mínima de pacientes que atiende. |
| `age_max` | `integer` | Edad máxima de pacientes que atiende. |
| `phone` | `string` | Teléfono de contacto / WhatsApp (incluye prefijo de país). |
| `email` | `string` | Correo electrónico de contacto profesional. |
| `preferred_contact` | `string` (enum) | Medio preferido: `whatsapp`, `telefono` o `correo`. |

## 4. Reglas de Negocio y Agenda
| Campo | Tipo de Dato | Descripción |
| :--- | :--- | :--- |
| `min_notice_hours` | `integer` | Horas mínimas de anticipación para agendar una cita. |
| `max_ahead_days` | `integer` | Días máximos a futuro permitidos para agendar. |
| `cancel_limit_hours` | `integer` | Límite de tiempo para cancelar sin penalización. |
| `arrival_grace_minutes`| `integer` | Tolerancia de retraso permitida al paciente. |

## 5. Pagos y Facturación
| Campo | Tipo de Dato | Descripción |
| :--- | :--- | :--- |
| `accepted_payment_methods` | `json` | Métodos aceptados (Efectivo, Tarjeta, Transferencia). |
| `payment_rule` | `string` | Momento del cobro: `at_reception` o `after_consultation`. |
| `billing_email` | `string` | Correo específico para recibir solicitudes de factura. |
| `billing_limit_hours` | `integer` | Tiempo máximo permitido para solicitar CFDI tras la cita. |
| `tax_regime` | `string` (code) | Código del régimen fiscal ante el SAT (ej: `612`, `626`). |

## 6. Horarios y Servicios (Relaciones)
*   **Horarios:** Requiere una tabla relacionada para almacenar bloques de tiempo (`start_time`, `end_time`) vinculados a un día     de la semana y a un médico/ubicación.
*   **Servicios:** Requiere una tabla de catálogo con `name`, `duration_minutes`, `price` y `requirements`.
