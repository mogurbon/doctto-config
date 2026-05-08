<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import TimeZoneSection from '@/Components/TimeZoneSection.vue';
import LocationSection from '@/Components/LocationSection.vue';
import FacilitiesSection from '@/Components/FacilitiesSection.vue';
import DoctorSection from '@/Components/DoctorSection.vue';

// Variable que controla la pestaña activa
const activeTab = ref('profile');

// Estructura de datos completa inicializada con useForm de Inertia
const form = useForm({
    time_zone: 'America/Mexico_City',
    location: {
        name: '',
        address_full: '',
        arrival_references: '',
        map_url: '',
        parking_available: true,
        accessibility_wheelchair: false,
        accessibility_elevator: false,
        accessibility_ramps: false,
        accessibility_accessible_bathroom: false
    },
    facilities: {
        has_waiting_room: true,
        waiting_room_capacity: 8,
        facility_notes: ''
    },
    doctor: {
        profile: { 
            name: '', 
            specialty: '', 
            age_min: 0, 
            age_max: 99 
        },
        contact: { 
            phone: '', 
            email: '', 
            preferred: 'whatsapp' 
        },
        hours: {
            lunes: [],
            martes: [],
            miercoles: [],
            jueves: [],
            viernes: [],
            sabado: [],
            domingo: []
        },
        rules: { 
            min_notice: 3, 
            max_ahead: 60 
        },
        services: [],
        policies: {
            cancel_notice: 2,
            arrival_tolerance: 15
        },
        payments: {
            methods: ['cash', 'card'],
            collection_rule: 'at_reception'
        },
        billing: {
            email: '',
            limit_hours: 72,
            regime: ''
        }
    }
});

const submitForm = () => {
    // La ruta 'agent.config.store' se asume que existirá o se usará una genérica por ahora
    // Si la ruta no existe, Inertia lanzará un error 404 que podremos corregir luego
    form.post(route('dashboard'), {
        preserveScroll: true,
        onSuccess: () => {
            // Manejar éxito si es necesario
        },
    });
};
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

                            <form id="practiceForm" @submit.prevent="submitForm">
                                <div class="space-y-6">

                                    <div class="w-full">
                                        <div class="text-center text-gray-400 text-sm">
                                            <TimeZoneSection v-model="form.time_zone" />
                                            <LocationSection v-model="form.location" />
                                            <FacilitiesSection v-model="form.facilities" />
                                        </div>
                                    </div>
                                    <DoctorSection v-model="form.doctor" />
                                    <div class="w-full pt-4 border-t border-gray-200 flex justify-end gap-3">
                                        <button 
                                            type="button" 
                                            @click="form.reset()" 
                                            class="px-4 py-2 bg-white border border-gray-200 rounded-md font-medium text-gray-700 hover:bg-slate-50"
                                            :disabled="form.processing"
                                        >
                                            Restablecer
                                        </button>
                                        <button 
                                            type="submit" 
                                            class="px-4 py-2 bg-green-600 border border-transparent rounded-md font-medium text-white hover:bg-green-700"
                                            :disabled="form.processing"
                                        >
                                            {{ form.processing ? 'Guardando...' : 'Guardar' }}
                                        </button>
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