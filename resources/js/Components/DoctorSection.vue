<script setup>
import { ref, watch } from 'vue';
import DoctorProfile from './Doctor/DoctorProfile.vue';
import DoctorContact from './Doctor/DoctorContact.vue';
import DoctorHours from './Doctor/DoctorHours.vue';
import DoctorRules from './Doctor/DoctorRules.vue';
import DoctorServices from './Doctor/DoctorServices.vue';
import DoctorPolicies from './Doctor/DoctorPolicies.vue';
import DoctorPayments from './Doctor/DoctorPayments.vue';
import DoctorBilling from './Doctor/DoctorBilling.vue';

const props = defineProps({
	modelValue: {
		type: Object,
		required: true,
	}
});

const emit = defineEmits(['update:modelValue']);
const form = props.modelValue;

// Asegurar estructura mínima del objeto form para evitar accesos a propiedades undefined
function ensureFormStructure() {
	if (!form.profile || typeof form.profile !== 'object') {
		form.profile = { name: '', specialty: '', age_min: 0, age_max: 99 };
	}
	if (!form.contact || typeof form.contact !== 'object') {
		form.contact = { phone: '', email: '', preferred: 'whatsapp' };
	}
	if (!form.rules || typeof form.rules !== 'object') {
		form.rules = { min_notice: 3, max_ahead: 60 };
	}
}

// Inicializar estructura segura
ensureFormStructure();

// Reasegurar si el objeto modelValue se reemplaza desde fuera
watch(() => props.modelValue, (nv) => {
	ensureFormStructure();
}, { deep: true });

// Normaliza la estructura de horarios para garantizar las 7 claves de la semana.
function normalizeWeekdays(input = {}) {
	const days = ['lunes','martes','miercoles','jueves','viernes','sabado','domingo'];
	const out = {};
	days.forEach(d => {
		const val = input && Object.prototype.hasOwnProperty.call(input, d) ? input[d] : undefined;
		out[d] = Array.isArray(val) ? val : [];
	});
	return out;
}

function ensureWeekdaysOnForm() {
	const days = ['lunes','martes','miercoles','jueves','viernes','sabado','domingo'];
	if (!form.hours || typeof form.hours !== 'object') {
		// Asignar objeto con las 7 claves si no existe
		form.hours = normalizeWeekdays({});
		return;
	}
	// Asegurar que cada día exista y sea un array
	days.forEach(d => {
		if (!Array.isArray(form.hours[d])) {
			form.hours[d] = [];
		}
	});
}

// Inicializar al cargar el componente
ensureWeekdaysOnForm();

// Re-normalizar si la fuente de datos cambia posteriormente
watch(() => props.modelValue && props.modelValue.hours, (newVal) => {
	const normalized = normalizeWeekdays(newVal || {});
	Object.keys(normalized).forEach(k => {
		form.hours[k] = normalized[k];
	});
}, { deep: true });

const activeTab = ref('profile');
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
						<DoctorProfile v-if="activeTab === 'profile'" v-model="form.profile" />
						<DoctorContact v-if="activeTab === 'contact'" v-model="form.contact" />
						<DoctorHours v-if="activeTab === 'hours'" v-model="form.hours" />
						<DoctorRules v-if="activeTab === 'rules'" v-model="form.rules" />
						<DoctorServices v-if="activeTab === 'services'" v-model="form" />
						<DoctorPolicies v-if="activeTab === 'policies'" v-model="form" />
						<DoctorPayments v-if="activeTab === 'payments'" v-model="form" />
						<DoctorBilling v-if="activeTab === 'billing'" v-model="form" />
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

