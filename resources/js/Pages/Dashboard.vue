<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { ref, reactive } from 'vue';
import TimeZoneSection from '@/Components/TimeZoneSection.vue';
import LocationSection from '@/Components/LocationSection.vue';
import FacilitiesSection from '@/Components/FacilitiesSection.vue';
import DoctorSection from '@/Components/DoctorSection.vue';

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
                                            <TimeZoneSection />
                                            <LocationSection />
                                            <FacilitiesSection />
                                        </div>
                                    </div>
                                    <DoctorSection v-model="form.doctor" />
                                    <div class="w-full pt-4 border-t border-gray-200 flex justify-end gap-3">
                                        <button type="button" class="px-4 py-2 bg-white border border-gray-200 rounded-md font-medium text-gray-700 hover:bg-slate-50">Restablecer</button>
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