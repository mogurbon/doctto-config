<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, reactive } from 'vue';

// Variable que controla la pestaña activa
const activeTab = ref('profile');

// Estructura de datos vacía para que los inputs no marquen error
const form = reactive({
    doctor: {
        profile: { name: '', specialty: '', age_min: 0, age_max: 99 },
        contact: { phone: '', email: '', preferred: 'whatsapp' },
        rules: { min_notice: 3, max_ahead: 60 }
    }
});
</script>

<template>
    <Head title="Configuración del Consultorio" />

    <AuthenticatedLayout>
        <template #header>
            <div class="mx-auto max-w-4xl">
                <h2 class="text-xl font-semibold leading-tight text-gray-800">
                    Configuración del Consultorio
                </h2>
            </div>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="px-8 py-6 text-gray-900">
                        
                        <div class="py-2">
                            <div class="mb-6">
                                <h1 class="text-2xl font-bold text-gray-900 mb-1">Formulario de Configuración</h1>
                                <p class="text-sm text-gray-500 mb-0">Quick Facts</p>
                            </div>

                            <form id="practiceForm" @submit.prevent>
                                <div class="space-y-6">

                                    <div class="w-full">
                                        <div class="text-center text-gray-400 text-sm">
                                           
                                            <section class="bg-white border border-gray-200 rounded-lg shadow-sm text-left mb-6">
                                                <div class="p-6">
                                                    <div class="flex flex-wrap items-start justify-between gap-3">
                                                        <div>
                                                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                                                Tipo de práctica <span class="text-red-500">*</span>
                                                            </label>
                                                            <div class="text-sm text-gray-500">Seleccione una opción.</div>
                                                        </div>
                                                    </div>

                                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4" role="radiogroup" aria-label="Tipo de práctica">
                                                        <div>
                                                            <input class="peer hidden" type="radio" name="practice_type" id="practice_type_solo" value="solo_practice" required checked />
                                                            <label class="flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-all peer-checked:border-indigo-600 peer-checked:ring-1 peer-checked:ring-indigo-600 peer-checked:bg-indigo-50" for="practice_type_solo">
                                                                <span class="mr-4 text-gray-400 peer-checked:text-indigo-600" aria-hidden="true">
                                                                    <svg viewBox="0 0 24 24" fill="none" class="w-7 h-7">
                                                                        <path d="M12 12c2.761 0 5-2.239 5-5S14.761 2 12 2 7 4.239 7 7s2.239 5 5 5Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M20 22a8 8 0 0 0-16 0" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                <span class="flex flex-col text-left">
                                                                    <span class="block font-medium text-gray-900 peer-checked:text-indigo-900">Soy consultorio</span>
                                                                    <span class="block text-sm text-gray-500 peer-checked:text-indigo-700">1 médico</span>
                                                                </span>
                                                            </label>
                                                        </div>

                                                        <div>
                                                            <input class="peer hidden" type="radio" name="practice_type" id="practice_type_clinic" value="clinic_multi_staff" required />
                                                            <label class="flex items-center p-4 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-all peer-checked:border-indigo-600 peer-checked:ring-1 peer-checked:ring-indigo-600 peer-checked:bg-indigo-50" for="practice_type_clinic">
                                                                <span class="mr-4 text-gray-400 peer-checked:text-indigo-600" aria-hidden="true">
                                                                    <svg viewBox="0 0 24 24" fill="none" class="w-7 h-7">
                                                                        <path d="M16 11c2.209 0 4-1.791 4-4S18.209 3 16 3s-4 1.791-4 4 1.791 4 4 4Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M8 12c2.761 0 5-2.239 5-5S10.761 2 8 2 3 4.239 3 7s2.239 5 5 5Z" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M22 22a6 6 0 0 0-12 0" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                                        <path d="M14 22a8 8 0 0 0-16 0" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </span>
                                                                <span class="flex flex-col text-left">
                                                                    <span class="block font-medium text-gray-900 peer-checked:text-indigo-900">Somos clínica</span>
                                                                    <span class="block text-sm text-gray-500 peer-checked:text-indigo-700">Varios médicos</span>
                                                                </span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section id="clinicBrandSection" style="display:none;" class="bg-white border border-gray-200 rounded-lg shadow-sm text-left mb-6">
                                                <div class="p-6">
                                                    <label for="clinic_brand_name" class="block text-sm font-semibold text-gray-700 mb-1">Nombre de la clínica</label>
                                                    <div class="text-sm text-gray-500 mb-4">Puede dejarlo vacío si no tiene marca.</div>
                                                    <input type="text" id="clinic_brand_name" name="clinic_brand_name" minlength="2" maxlength="120" placeholder="Ej: Clínica San José" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                                    <div id="clinicBrandError" style="display:none;" class="mt-2 text-sm text-red-600">Debe tener entre 2 y 120 caracteres.</div>
                                                </div>
                                            </section>
                                            <section class="bg-white border border-gray-200 rounded-lg shadow-sm text-left mb-6">
                                                <div class="p-6">
                                                    <label for="time_zone" class="block text-sm font-semibold text-gray-700 mb-1">Zona horaria <span class="text-red-500">*</span></label>
                                                    <div class="text-sm text-gray-500 mb-4">Se usará para horarios, recordatorios y reportes.</div>
                                                    <select id="time_zone" name="time_zone" required minlength="3" maxlength="64" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                        <option value="">Seleccione una zona horaria...</option>
                                                        <option value="America/Mexico_City" selected>America/Mexico_City</option>
                                                    </select>
                                                    <div id="timeZoneError" style="display:none;" class="mt-2 text-sm text-red-600">Seleccione una zona horaria válida.</div>
                                                </div>
                                            </section>
                                            <section id="locationSection" class="bg-white border border-gray-200 rounded-lg shadow-sm text-left mb-6">
                                                <div class="p-6">
                                                    <div class="flex items-start gap-3 border-b border-gray-100 pb-4 mb-6">
                                                        <div class="text-indigo-600 mt-1" aria-hidden="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                                <path fill-rule="evenodd" d="M11.54 22.351l.07.04.028.016a.76.76 0 00.723 0l.028-.015.071-.041a16.975 16.975 0 001.144-.742 19.58 19.58 0 002.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 00-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 002.682 2.282 16.975 16.975 0 001.145.742zM12 13.5a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <h3 class="text-lg font-semibold text-gray-900">Ubicación</h3>
                                                            <p class="text-sm text-gray-500">Datos para que el bot comparta indicaciones.</p>
                                                        </div>
                                                    </div>

                                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                                        <div class="space-y-6">
                                                            <div>
                                                                <label for="location_name" class="block text-sm font-semibold text-gray-700 mb-1">Nombre del lugar <span class="text-red-500">*</span></label>
                                                                <div class="text-sm text-gray-500 mb-2">Nombre que el paciente reconocerá.</div>
                                                                <input type="text" id="location_name" name="location_name" required minlength="2" maxlength="100" placeholder="Plaza comercial Galerias" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                                            </div>
                                                            <div>
                                                                <label for="address_full" class="block text-sm font-semibold text-gray-700 mb-1">Dirección completa <span class="text-red-500">*</span></label>
                                                                <div class="text-sm text-gray-500 mb-2">Escribe la dirección completa.</div>
                                                                <textarea id="address_full" name="address_full" required minlength="10" maxlength="400" rows="4" placeholder="Calle, Número, Colonia, Delegación/Municipio, Estado, C.P." class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                                            </div>
                                                            <div>
                                                                <label for="arrival_references" class="block text-sm font-semibold text-gray-700 mb-1">Referencias para llegar</label>
                                                                <div class="text-sm text-gray-500 mb-2">Puntos de referencia fáciles.</div>
                                                                <textarea id="arrival_references" name="arrival_references" maxlength="400" rows="3" placeholder="Cerca de..., Plaza..., frente a..." class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="space-y-6">
                                                            <div>
                                                                <label for="map_url" class="block text-sm font-semibold text-gray-700 mb-1">Link de Google Maps</label>
                                                                <div class="text-sm text-gray-500 mb-2">Opcional, pero ayuda al bot a compartir ubicación.</div>
                                                                <input type="url" id="map_url" name="map_url" placeholder="https://maps.google.com/..." class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                                            </div>
                                                            <div>
                                                                <label class="block text-sm font-semibold text-gray-700 mb-1">¿Hay estacionamiento?</label>
                                                                <div class="text-sm text-gray-500 mb-3">Si hay estacionamiento en la plaza/edificio.</div>
                                                                <label class="relative inline-flex items-center cursor-pointer">
                                                                    <input type="checkbox" id="parking_available" name="parking_available" class="sr-only peer" checked>
                                                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                                                                    <span class="ml-3 text-sm font-semibold text-gray-900">Sí</span>
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <label class="block text-sm font-semibold text-gray-700 mb-3">Accesibilidad</label>
                                                                <div class="space-y-3">
                                                                    <div class="flex items-center">
                                                                        <input id="accessibility_wheelchair" type="checkbox" value="wheelchair" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500">
                                                                        <label for="accessibility_wheelchair" class="ml-2 text-sm text-gray-700">Acceso silla de ruedas</label>
                                                                    </div>
                                                                    <div class="flex items-center">
                                                                        <input id="accessibility_elevator" type="checkbox" value="elevator" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500">
                                                                        <label for="accessibility_elevator" class="ml-2 text-sm text-gray-700">Elevador</label>
                                                                    </div>
                                                                    <div class="flex items-center">
                                                                        <input id="accessibility_ramps" type="checkbox" value="ramps" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500">
                                                                        <label for="accessibility_ramps" class="ml-2 text-sm text-gray-700">Rampas</label>
                                                                    </div>
                                                                    <div class="flex items-center">
                                                                        <input id="accessibility_accessible_bathroom" type="checkbox" value="accessible_bathroom" class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500">
                                                                        <label for="accessibility_accessible_bathroom" class="ml-2 text-sm text-gray-700">Baño accesible</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <section id="facilitiesSection" class="bg-white border border-gray-200 rounded-lg shadow-sm text-left mb-6">
                                                <div class="p-6">
                                                    <div class="flex items-start gap-3 border-b border-gray-100 pb-4 mb-6">
                                                        <div class="text-indigo-600 mt-1" aria-hidden="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                                <path fill-rule="evenodd" d="M3 2.25a.75.75 0 000 1.5v16.5h-.75a.75.75 0 000 1.5h15a.75.75 0 000-1.5h-.75V3.75a.75.75 0 000-1.5h-13.5zM6 6.75A.75.75 0 016.75 6h.5a.75.75 0 01.75.75v.5a.75.75 0 01-.75.75h-.5A.75.75 0 016 7.25v-.5zm0 3.5a.75.75 0 01.75-.75h.5a.75.75 0 01.75.75v.5a.75.75 0 01-.75.75h-.5A.75.75 0 016 7.25v-.5zm0 3.5a.75.75 0 01.75-.75h.5a.75.75 0 01.75.75v.5a.75.75 0 01-.75.75h-.5a.75.75 0 01-.75-.75v-.5zm6-7a.75.75 0 01.75-.75h.5a.75.75 0 01.75.75v.5a.75.75 0 01-.75.75h-.5a.75.75 0 01-.75-.75v-.5zm0 3.5a.75.75 0 01.75-.75h.5a.75.75 0 01.75.75v.5a.75.75 0 01-.75.75h-.5a.75.75 0 01-.75-.75v-.5zm0 3.5a.75.75 0 01.75-.75h.5a.75.75 0 01.75.75v.5a.75.75 0 01-.75.75h-.5a.75.75 0 01-.75-.75v-.5z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        <div>
                                                            <h3 class="text-lg font-semibold text-gray-900">Instalaciones</h3>
                                                            <p class="text-sm text-gray-500">Datos del consultorio/clínica.</p>
                                                        </div>
                                                    </div>

                                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                                                        <div class="space-y-6">
                                                            <div>
                                                                <label class="block text-sm font-semibold text-gray-700 mb-1">
                                                                    ¿Tienes sala de espera? <span class="text-red-500">*</span>
                                                                </label>
                                                                <div class="text-sm text-gray-500 mb-3">Si el consultorio cuenta con sala de espera.</div>
                                                                <label class="relative inline-flex items-center cursor-pointer">
                                                                    <input type="checkbox" id="has_waiting_room" name="has_waiting_room" class="sr-only peer" checked>
                                                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                                                                    <span class="ml-3 text-sm font-semibold text-gray-900">Sí</span>
                                                                </label>
                                                            </div>

                                                            <div id="waitingRoomCapacityWrapper">
                                                                <label for="waiting_room_capacity" class="block text-sm font-semibold text-gray-700 mb-1">Capacidad de sala de espera</label>
                                                                <div class="text-sm text-gray-500 mb-2">Opcional. Número aproximado.</div>
                                                                <div class="flex rounded-md shadow-sm">
                                                                    <input type="number" id="waiting_room_capacity" name="waiting_room_capacity" min="0" max="200" step="1" placeholder="8" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                                                                    <span class="inline-flex items-center px-3 rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                                                                        personas
                                                                    </span>
                                                                </div>
                                                                <div id="waitingRoomCapacityError" style="display:none;" class="mt-1 text-sm text-red-600">
                                                                    Debe estar entre 0 y 200.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="space-y-6">
                                                            <div>
                                                                <label for="facility_notes" class="block text-sm font-semibold text-gray-700 mb-1">Comentarios de instalaciones</label>
                                                                <div class="text-sm text-gray-500 mb-2">Ej: 'Ambiente familiar', 'área para niños', etc.</div>
                                                                <textarea id="facility_notes" name="facility_notes" rows="5" placeholder="Ambiente familiar..." class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            </div>
                                    </div>
                                    <section class="mb-6" id="doctorsSection">
                                        <div class="flex items-start justify-between gap-3 mb-4">
                                            <div>
                                                <h2 class="text-lg font-semibold text-gray-900 mb-1">Médico</h2>
                                                <div class="text-sm text-gray-500">Configuración del médico.</div>
                                            </div>
                                        </div>

                                        <div id="doctorsList">
                                            <div class="bg-white border border-gray-200 rounded-lg shadow-sm mb-4">
                                                
                                                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100 bg-gray-50 rounded-t-lg">
                                                    <div class="flex items-center gap-2">
                                                        <span class="font-semibold text-gray-800">Médico</span>
                                                        <span class="inline-flex items-center rounded-full bg-white px-2.5 py-0.5 text-xs font-medium text-gray-600 border border-gray-200">Configuración</span>
                                                    </div>
                                                </div>

                                                <div class="flex flex-col md:flex-row">
                                                    <div class="w-full md:w-1/4 border-b md:border-b-0 md:border-r border-gray-100 bg-white">
                                                        <!-- <nav class="flex flex-col" aria-label="Tabs del médico">
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="profile">Perfil</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="contact">Contacto</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="hours">Horarios</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="rules">Reglas</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="services">Servicios</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="policies">Políticas</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-transparent text-gray-600 hover:bg-gray-50" data-target="payments">Pagos</button>
                                                            <button type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 border-indigo-600 text-indigo-700 bg-indigo-50" data-target="billing">Facturación</button>
                                                        </nav> -->
                                                        <nav class="flex flex-col" aria-label="Tabs del médico">
                                                            <button @click="activeTab = 'profile'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'profile' ? 'border-indigo-600 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:bg-gray-50'">Perfil</button>
                                                            <button @click="activeTab = 'contact'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'contact' ? 'border-indigo-600 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:bg-gray-50'">Contacto</button>
                                                            <button @click="activeTab = 'hours'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'hours' ? 'border-indigo-600 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:bg-gray-50'">Horarios</button>
                                                            <button @click="activeTab = 'rules'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'rules' ? 'border-indigo-600 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:bg-gray-50'">Reglas</button>
                                                            <button @click="activeTab = 'services'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'services' ? 'border-indigo-600 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:bg-gray-50'">Servicios</button>
                                                            <button @click="activeTab = 'policies'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'policies' ? 'border-indigo-600 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:bg-gray-50'">Políticas</button>
                                                            <button @click="activeTab = 'payments'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'payments' ? 'border-indigo-600 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:bg-gray-50'">Pagos</button>
                                                            <button @click="activeTab = 'billing'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'billing' ? 'border-indigo-600 text-indigo-700 bg-indigo-50' : 'border-transparent text-gray-600 hover:bg-gray-50'">Facturación</button>
                                                        </nav>
                                                    </div>

                                                    <div class="w-full md:w-3/4 p-6 bg-white">

                                                        <div v-if="activeTab === 'profile'">
                                                            <div class="mb-5">
                                                                <h3 class="text-lg font-semibold text-gray-900">Perfil del Médico</h3>
                                                                <p class="text-sm text-gray-500">Datos base del médico.</p>
                                                            </div>
                                                            <div class="space-y-6">
                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nombre <span class="text-red-500">*</span></label>
                                                                    <div class="text-sm text-gray-500 mb-2">Nombre del médico.</div>
                                                                    <input type="text" v-model="form.doctor.profile.name" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required placeholder="Ej: Dr. Juan Pérez" />
                                                                </div>
                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Especialidad <span class="text-red-500">*</span></label>
                                                                    <select v-model="form.doctor.profile.specialty" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                                                        <option value="" disabled>Seleccione…</option>
                                                                        <option value="pediatria">Pediatría</option>
                                                                        <option value="medicina_general">Medicina General</option>
                                                                        <option value="ginecologia">Ginecología</option>
                                                                        <option value="otro">Otro</option>
                                                                    </select>
                                                                </div>
                                                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                                                    <div>
                                                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Edad mínima <span class="text-red-500">*</span></label>
                                                                        <div class="flex rounded-md shadow-sm">
                                                                            <input type="number" v-model="form.doctor.profile.age_min" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" min="0" required />
                                                                            <span class="inline-flex items-center px-3 py-2 rounded-none rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-700 sm:text-sm">años</span>
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Edad máxima <span class="text-red-500">*</span></label>
                                                                        <div class="flex rounded-md shadow-sm">
                                                                            <input type="number" v-model="form.doctor.profile.age_max" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-l-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" min="0" required />
                                                                            <span class="inline-flex items-center px-3 py-2 rounded-none rounded-r-md border border-l-0 border-gray-300 bg-gray-50 text-gray-700 sm:text-sm">años</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                                                                </div>

                                                        <div v-if="activeTab === 'contact'">
                                                            <div class="mb-5">
                                                                <h3 class="text-lg font-semibold text-gray-900">Contacto</h3>
                                                                <p class="text-sm text-gray-500">Datos para que los pacientes puedan comunicarse contigo.</p>
                                                            </div>
                                                            <div class="space-y-6">
                                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                                    <div>
                                                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Teléfono / WhatsApp <span class="text-red-500">*</span></label>
                                                                        <div class="flex rounded-md shadow-sm">
                                                                            <span class="inline-flex items-center px-3 py-2 rounded-none rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-700 sm:text-sm">🇲🇽 +52</span>
                                                                            <input type="tel" v-model="form.doctor.contact.phone" class="flex-1 min-w-0 block w-full px-3 py-2 rounded-none rounded-r-md border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required placeholder="55 1234 5678" />
                                                                        </div>
                                                                    </div>
                                                                    <div>
                                                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Correo de contacto <span class="text-red-500">*</span></label>
                                                                        <input type="email" v-model="form.doctor.contact.email" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required placeholder="doctor@ejemplo.com" />
                                                                    </div>
                                                                </div>
                                                                <div class="mt-6 border-t border-gray-100 pt-6">
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Medio de contacto preferido <span class="text-red-500">*</span></label>
                                                                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mt-4">
                                                                        <label class="relative flex flex-col items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50" :class="form.doctor.contact.preferred === 'whatsapp' ? 'border-indigo-600 bg-indigo-50 text-indigo-700' : 'border-gray-200 text-gray-500'">
                                                                            <input type="radio" v-model="form.doctor.contact.preferred" value="whatsapp" class="sr-only">
                                                                            <span class="font-medium">WhatsApp</span>
                                                                        </label>
                                                                        <label class="relative flex flex-col items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50" :class="form.doctor.contact.preferred === 'telefono' ? 'border-indigo-600 bg-indigo-50 text-indigo-700' : 'border-gray-200 text-gray-500'">
                                                                            <input type="radio" v-model="form.doctor.contact.preferred" value="telefono" class="sr-only">
                                                                            <span class="font-medium">Teléfono</span>
                                                                        </label>
                                                                        <label class="relative flex flex-col items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-gray-50" :class="form.doctor.contact.preferred === 'correo' ? 'border-indigo-600 bg-indigo-50 text-indigo-700' : 'border-gray-200 text-gray-500'">
                                                                            <input type="radio" v-model="form.doctor.contact.preferred" value="correo" class="sr-only">
                                                                            <span class="font-medium">Correo</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div v-if="activeTab === 'hours'">
                                                            <div class="mb-5">
                                                                <h3 class="text-lg font-semibold text-gray-900">Horarios de atención</h3>
                                                                <p class="text-sm text-gray-500">Define en qué días y horarios atiende este médico.</p>
                                                            </div>
                                                            <div class="border-b border-gray-200 mb-4">
                                                                <nav class="-mb-px flex space-x-4 overflow-x-auto">
                                                                    <button type="button" class="border-indigo-500 text-indigo-600 py-2 px-1 border-b-2 font-medium text-sm">Lunes</button>
                                                                    <button type="button" class="border-transparent text-gray-500 py-2 px-1 border-b-2 font-medium text-sm">Martes</button>
                                                                    <button type="button" class="border-transparent text-gray-500 py-2 px-1 border-b-2 font-medium text-sm">Miércoles</button>
                                                                    <button type="button" class="border-transparent text-gray-500 py-2 px-1 border-b-2 font-medium text-sm">Jueves</button>
                                                                    <button type="button" class="border-transparent text-gray-500 py-2 px-1 border-b-2 font-medium text-sm">Viernes</button>
                                                                </nav>
                                                            </div>
                                                            <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 mb-6">
                                                                <div class="flex items-center justify-between mb-4">
                                                                    <label class="relative inline-flex items-center cursor-pointer">
                                                                        <input type="checkbox" checked class="sr-only peer">
                                                                        <div class="w-11 h-6 bg-gray-200 peer-focus:ring-indigo-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                                                                        <span class="ml-3 text-sm font-semibold text-gray-900">¿Abre este día?</span>
                                                                    </label>
                                                                </div>
                                                                <div class="flex items-center gap-3">
                                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-white border border-gray-200 text-gray-700">Bloque 1</span>
                                                                    <div class="flex items-center">
                                                                        <span class="text-sm text-gray-500 mr-2">Inicio</span>
                                                                        <input type="time" value="09:00" class="border-gray-300 rounded-md shadow-sm sm:text-sm">
                                                                    </div>
                                                                    <div class="flex items-center">
                                                                        <span class="text-sm text-gray-500 mr-2">Fin</span>
                                                                        <input type="time" value="18:00" class="border-gray-300 rounded-md shadow-sm sm:text-sm">
                                                                    </div>
                                                                    <button type="button" class="text-red-500 hover:text-red-700 p-1">
                                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                                    </button>
                                                                </div>
                                                                <div class="mt-4">
                                                                    <button type="button" class="text-sm text-indigo-600 font-medium">+ Añadir bloque</button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div v-if="activeTab === 'rules'">
                                                            <div class="mb-5">
                                                                <h3 class="text-lg font-semibold text-gray-900">Reglas de agenda</h3>
                                                                <p class="text-sm text-gray-500">Duración, buffers, tolerancia, cupos, etc.</p>
                                                            </div>
                                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Anticipación mínima (horas) <span class="text-red-500">*</span></label>
                                                                    <input type="number" v-model="form.doctor.rules.min_notice" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" min="0" required />
                                                                </div>
                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Máximo días por adelantado <span class="text-red-500">*</span></label>
                                                                    <input type="number" v-model="form.doctor.rules.max_ahead" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" min="1" required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div v-if="activeTab === 'services'">
                                                            <div class="mb-5">
                                                                <h3 class="text-lg font-semibold text-gray-900">Servicios</h3>
                                                                <p class="text-sm text-gray-500">Configura el catálogo de servicios: nombre, duración, precio y requisitos.</p>
                                                            </div>
                                                            <div class="border border-gray-200 rounded-lg overflow-hidden mb-6">
                                                                <div class="bg-gray-50 px-4 py-2 border-b border-gray-200 flex justify-between items-center">
                                                                    <span class="text-xs font-bold text-gray-500 uppercase">Servicio</span>
                                                                    <span class="text-xs font-bold text-gray-500 uppercase">Acción</span>
                                                                </div>
                                                                <div class="divide-y divide-gray-200">
                                                                    <div class="px-4 py-3 flex justify-between items-center bg-white">
                                                                        <div>
                                                                            <p class="text-sm font-medium text-gray-900">Consulta General</p>
                                                                            <p class="text-xs text-gray-500">30 min • $800.00 MXN</p>
                                                                        </div>
                                                                        <button type="button" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium italic underline">Editar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button" class="inline-flex items-center px-3 py-1.5 border border-indigo-600 text-indigo-600 rounded-md text-sm font-medium hover:bg-indigo-50 mb-4">
                                                                + Agregar servicio
                                                            </button>
                                                        </div>

                                                        <div v-if="activeTab === 'policies'">
                                                            <div class="mb-5">
                                                                <h3 class="text-lg font-semibold text-gray-900">Políticas</h3>
                                                                <p class="text-sm text-gray-500">Cancelaciones, cambios, tolerancia, etc.</p>
                                                            </div>
                                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Cancelar sin costo hasta (horas antes)</label>
                                                                    <input type="number" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm" min="0" value="2" required />
                                                                </div>
                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Tolerancia de llegada (minutos)</label>
                                                                    <input type="number" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm" min="0" value="15" required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div v-if="activeTab === 'payments'">
                                                            <div class="mb-5">
                                                                <h3 class="text-lg font-semibold text-gray-900">Pagos</h3>
                                                                <p class="text-sm text-gray-500">Métodos, reglas de cobro y meses sin intereses.</p>
                                                            </div>
                                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Métodos de pago aceptados</label>
                                                                    <div class="grid grid-cols-2 gap-3">
                                                                        <label class="flex items-center space-x-2"><input type="checkbox" checked class="w-4 h-4 text-indigo-600 border-gray-300 rounded"><span class="text-sm text-gray-600">Efectivo</span></label>
                                                                        <label class="flex items-center space-x-2"><input type="checkbox" checked class="w-4 h-4 text-indigo-600 border-gray-300 rounded"><span class="text-sm text-gray-600">Tarjeta</span></label>
                                                                        <label class="flex items-center space-x-2"><input type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded"><span class="text-sm text-gray-600">Transferencia</span></label>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Regla de cobro</label>
                                                                    <select class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm">
                                                                        <option value="at_reception">Al llegar a recepción</option>
                                                                        <option value="after_consultation">Al finalizar la consulta</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div v-if="activeTab === 'billing'">
                                                            <div class="mb-5">
                                                                <h3 class="text-lg font-semibold text-gray-900">Facturación</h3>
                                                                <p class="text-sm text-gray-500">Datos para CFDI y contacto de facturación.</p>
                                                            </div>
                                                            <div class="space-y-6">
                                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                                    <div>
                                                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Correo para facturación</label>
                                                                        <input type="email" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm" placeholder="facturacion@ejemplo.com" required>
                                                                    </div>
                                                                    <div>
                                                                        <label class="block text-sm font-semibold text-gray-700 mb-1">Límite para solicitar CFDI (horas)</label>
                                                                        <input type="number" class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm" value="72" required>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1">Régimen del emisor (SAT)</label>
                                                                    <select class="w-full border-gray-300 rounded-md shadow-sm sm:text-sm" required>
                                                                        <option value="">Selecciona…</option>
                                                                        <option value="612">612 — Personas Físicas con Actividades Empresariales</option>
                                                                        <option value="626">626 — Régimen Simplificado de Confianza (RESICO)</option>
                                                                        <option value="601">601 — General de Ley Personas Morales</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="block" data-panel="billing">
                                                            <div class="mb-5">
                                                                <h3 class="text-lg font-semibold text-gray-900 italic">Facturación</h3>
                                                                <p class="text-sm text-gray-500 italic">Datos para CFDI y contacto de facturación.</p>
                                                            </div>

                                                            <div class="space-y-6">
                                                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                                                    <div>
                                                                        <label class="block text-sm font-semibold text-gray-700 mb-1 italic">Correo para facturación <span class="text-red-500">*</span></label>
                                                                        <input type="email" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="facturacion@ejemplo.com" required>
                                                                        <p class="text-xs text-gray-400 mt-1 italic">Donde reciben solicitudes de CFDI.</p>
                                                                    </div>

                                                                    <div>
                                                                        <label class="block text-sm font-semibold text-gray-700 mb-1 italic">Límite para solicitar CFDI (horas) <span class="text-red-500">*</span></label>
                                                                        <input type="number" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="72" required>
                                                                        <p class="text-xs text-gray-400 mt-1 italic">Tiempo máximo tras la consulta.</p>
                                                                    </div>
                                                                </div>

                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1 italic">Régimen del emisor (SAT) <span class="text-red-500">*</span></label>
                                                                    <select class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                                                        <option value="">Selecciona…</option>
                                                                        <option value="612">612 — Personas Físicas con Actividades Empresariales y Profesionales</option>
                                                                        <option value="626">626 — Régimen Simplificado de Confianza (RESICO)</option>
                                                                        <option value="601">601 — General de Ley Personas Morales</option>
                                                                    </select>
                                                                    <p class="text-xs text-gray-400 mt-1 italic">Tal como aparece en tu Constancia de Situación Fiscal.</p>
                                                                </div>

                                                                <div>
                                                                    <label class="block text-sm font-semibold text-gray-700 mb-1 italic">Notas de facturación</label>
                                                                    <textarea class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" rows="3" placeholder="Ej: Solo se factura en el mes de consumo..."></textarea>
                                                                    <p class="text-xs text-gray-400 mt-1 italic">Cualquier regla o instrucción extra.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    
                                    <div class="w-full pt-4 border-t border-gray-100 flex justify-end gap-3">
                                        <button type="button" class="px-4 py-2 bg-white border border-gray-300 rounded-md font-medium text-gray-700 hover:bg-gray-50">Restablecer</button>
                                        <button type="submit" class="px-4 py-2 bg-green-600 border border-transparent rounded-md font-medium text-white hover:bg-green-700">Guardar</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>