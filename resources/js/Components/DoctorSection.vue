<script setup>
import { ref } from 'vue';
import DoctorProfile from './Doctor/DoctorProfile.vue';
import DoctorContact from './Doctor/DoctorContact.vue';
import DoctorHours from './Doctor/DoctorHours.vue';
import DoctorRules from './Doctor/DoctorRules.vue';
import DoctorServices from './Doctor/DoctorServices.vue';
import DoctorPolicies from './Doctor/DoctorPolicies.vue';
import DoctorPayments from './Doctor/DoctorPayments.vue';
import DoctorBilling from './Doctor/DoctorBilling.vue';

const model = defineModel({
    type: Object,
    required: true,
});

const activeTab = ref('profile');

// Nota: La inicialización profunda ya se realiza en Dashboard.vue
// pero mantenemos una comprobación ligera para seguridad si es necesario.
</script>

<template>
	<section class="mb-6" id="doctorsSection">
		<div class="flex items-start justify-between gap-3 mb-4">
			<div>
				<h2 class="text-lg font-semibold text-gray-900 mb-1">Médico</h2>
				<div class="text-sm text-gray-500">Configuración del médico.</div>
			</div>
		</div>

		<div id="doctorsList">
			<div class="bg-slate-50 border border-gray-200 rounded-lg shadow-sm mb-4">
				<div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 bg-slate-50 rounded-t-lg">
					<div class="flex items-center gap-2">
						<span class="font-semibold text-gray-800">Médico</span>
						<span class="inline-flex items-center rounded-full bg-slate-50 px-2.5 py-0.5 text-xs font-medium text-gray-600 border border-gray-200">Configuración</span>
					</div>
				</div>

				<div class="flex flex-col md:flex-row">
					<div class="w-full md:w-1/4 border-b md:border-b-0 md:border-r border-gray-200 bg-slate-50">
						<nav class="flex flex-col" aria-label="Tabs del médico">
							<button @click="activeTab = 'profile'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'profile' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Perfil</button>
							<button @click="activeTab = 'contact'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'contact' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Contacto</button>
							<button @click="activeTab = 'hours'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'hours' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Horarios</button>
							<button @click="activeTab = 'rules'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'rules' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Reglas</button>
							<button @click="activeTab = 'services'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'services' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Servicios</button>
							<button @click="activeTab = 'policies'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'policies' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Políticas</button>
							<button @click="activeTab = 'payments'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'payments' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Pagos</button>
							<button @click="activeTab = 'billing'" type="button" class="text-left px-4 py-3 text-sm font-medium border-l-4 transition-colors" :class="activeTab === 'billing' ? 'border-cyan-500 text-cyan-700 bg-cyan-50' : 'border-gray-200 text-gray-600 hover:bg-slate-50'">Facturación</button>
						</nav>
					</div>

					<div class="w-full md:w-3/4 p-6 bg-slate-50">
						<DoctorProfile :class="{ 'hidden': activeTab !== 'profile' }" v-model="model.profile" />
						<DoctorContact :class="{ 'hidden': activeTab !== 'contact' }" v-model="model.contact" />
						<DoctorHours :class="{ 'hidden': activeTab !== 'hours' }" v-model="model.hours" />
						<DoctorRules :class="{ 'hidden': activeTab !== 'rules' }" v-model="model.rules" />
						<DoctorServices :class="{ 'hidden': activeTab !== 'services' }" v-model="model.services" />
						<DoctorPolicies :class="{ 'hidden': activeTab !== 'policies' }" v-model="model.policies" />
						<DoctorPayments :class="{ 'hidden': activeTab !== 'payments' }" v-model="model.payments" />
						<DoctorBilling :class="{ 'hidden': activeTab !== 'billing' }" v-model="model.billing" />
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

