<script setup>
import { ref, onMounted } from 'vue';

const model = defineModel({
	type: Object,
	default: () => ({})
});

const expandedServiceIndex = ref(null);

const createEmptyService = () => ({
	name: '',
	category: 'consulta',
	duration: 30,
	pricing_type: 'fixed',
	price: 0,
	locked: false,
	bookable: true,
	description: '',
	notes: '',
	includes: [],
	docs: [],
	stop_meds: [],
	links: [],
	fasting: {
		required: false,
		hours: 0
	},
	arrival_minutes: 0
});

onMounted(() => {
	if (!model.value.services) {
		model.value.services = [];
	}
});

const addService = () => {
	model.value.services.push(createEmptyService());
	expandedServiceIndex.value = model.value.services.length - 1;
};

const removeService = (index) => {
	if (model.value.services[index].locked) return;
	
	if (confirm('¿Estás seguro de que deseas eliminar este servicio?')) {
		model.value.services.splice(index, 1);
		if (expandedServiceIndex.value === index) {
			expandedServiceIndex.value = null;
		} else if (expandedServiceIndex.value > index) {
			expandedServiceIndex.value--;
		}
	}
};

const toggleExpand = (index) => {
	if (expandedServiceIndex.value === index) {
		expandedServiceIndex.value = null;
	} else {
		expandedServiceIndex.value = index;
	}
};
</script>

<template>
	<div v-if="model.services">
		<div class="mb-5">
			<h3 class="text-lg font-semibold text-blue-900">Servicios</h3>
			<p class="text-sm text-slate-500">Configura el catálogo de servicios: nombre, duración, precio y requisitos.</p>
		</div>

		<!-- Estado vacío -->
		<div v-if="model.services.length === 0" class="border border-slate-200 rounded-lg p-8 text-center bg-slate-50 mb-6">
			<p class="text-slate-500 text-sm italic">No hay servicios capturados.</p>
		</div>

		<!-- Lista de servicios (Índice) -->
		<div v-else class="border border-slate-200 rounded-lg overflow-hidden mb-6">
			<div class="bg-slate-50 px-4 py-2 border-b border-slate-200 flex justify-between items-center text-xs font-bold text-slate-500 uppercase tracking-wider">
				<span>Servicio</span>
				<span>Acción</span>
			</div>
			<div class="divide-y divide-slate-200">
				<div v-for="(service, index) in model.services" :key="index" class="px-4 py-3 flex justify-between items-center hover:bg-slate-50 transition-colors">
					<div>
						<p class="text-sm font-semibold text-blue-900">{{ service.name || 'Sin nombre' }}</p>
						<p class="text-xs text-slate-500">
							{{ service.duration }} min • 
							{{ service.pricing_type === 'fixed' ? `$${service.price} MXN` : 'Cotización' }}
						</p>
					</div>
					<button 
						@click="toggleExpand(index)"
						type="button" 
						class="text-blue-600 hover:text-blue-900 text-sm font-medium italic underline focus:outline-none"
					>
						{{ expandedServiceIndex === index ? 'Cerrar' : 'Editar' }}
					</button>
				</div>
			</div>
		</div>

		<!-- Botón Agregar (Superior) -->
		<div class="flex justify-between items-center mb-6">
			<button 
				@click="addService"
				type="button" 
				class="inline-flex items-center px-4 py-2 border border-blue-600 text-blue-600 rounded-md text-sm font-semibold hover:bg-blue-50 transition-colors focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
			>
				<span class="mr-2 text-lg">+</span> Agregar servicio
			</button>
			<p class="text-slate-400 text-xs italic hidden md:block">
				Sugerencia: define al menos una consulta de primera vez y una subsecuente.
			</p>
		</div>

		<!-- Formulario Detalle (Acordeón) -->
		<div v-for="(service, index) in model.services" :key="'form-' + index">
			<div v-if="expandedServiceIndex === index" class="border border-slate-300 rounded-xl p-6 bg-white shadow-sm mb-6 animate-in fade-in slide-in-from-top-2 duration-300">
				<!-- Header del servicio -->
				<div class="flex justify-between items-start gap-4 mb-6">
					<div class="flex-grow grid grid-cols-1 md:grid-cols-12 gap-4">
						<div class="md:col-span-8">
							<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Nombre del servicio</label>
							<input 
								v-model="service.name"
								type="text" 
								class="w-full text-sm border-slate-200 rounded-md focus:ring-blue-500 focus:border-blue-500"
								placeholder="Ej: Consulta primera vez"
							>
						</div>
						<div class="md:col-span-4">
							<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Categoría</label>
							<select 
								v-model="service.category"
								class="w-full text-sm border-slate-200 rounded-md focus:ring-blue-500 focus:border-blue-500"
							>
								<option value="consulta">Consulta</option>
								<option value="estudio">Estudio / prueba</option>
								<option value="procedimiento">Procedimiento</option>
								<option value="otro">Otro</option>
							</select>
						</div>
					</div>
					<button 
						v-if="!service.locked"
						@click="removeService(index)"
						type="button" 
						class="text-red-400 hover:text-red-600 p-2 transition-colors focus:outline-none"
						title="Eliminar servicio"
					>
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
						</svg>
					</button>
				</div>

				<!-- Configuración Flags -->
				<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
					<div class="flex items-center">
						<input 
							v-model="service.locked"
							type="checkbox" 
							class="h-4 w-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500"
						>
						<label class="ml-2 text-sm text-slate-700">Bloqueado (no se puede eliminar)</label>
					</div>
					<div class="flex items-center">
						<input 
							v-model="service.bookable"
							type="checkbox" 
							class="h-4 w-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500"
						>
						<label class="ml-2 text-sm text-slate-700">Se puede agendar por el bot</label>
					</div>
				</div>

				<!-- Descripción y Notas -->
				<div class="space-y-4 mb-6">
					<div>
						<label class="block text-xs font-bold text-blue-900 uppercase mb-1">¿En qué consiste?</label>
						<textarea 
							v-model="service.description"
							rows="2" 
							class="w-full text-sm border-slate-200 rounded-md focus:ring-blue-500 focus:border-blue-500"
							placeholder="Descripción breve para el paciente."
						></textarea>
					</div>
					<div>
						<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Notas / limitaciones</label>
						<textarea 
							v-model="service.notes"
							rows="2" 
							class="w-full text-sm border-slate-200 rounded-md focus:ring-blue-500 focus:border-blue-500"
							placeholder="Restricciones, advertencias o aclaraciones importantes."
						></textarea>
					</div>
				</div>

				<!-- Listas Dinámicas -->
				<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
					<!-- Incluye -->
					<div>
						<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Incluye</label>
						<p class="text-xs text-slate-500 mb-2">Elementos incluidos en este servicio.</p>
						<div class="space-y-2 mb-2">
							<div v-for="(item, i) in service.includes" :key="i" class="flex gap-2">
								<input 
									v-model="service.includes[i]"
									type="text" 
									class="flex-grow text-sm border-slate-200 rounded-md"
								>
								<button @click="service.includes.splice(i, 1)" type="button" class="text-slate-400 hover:text-red-500">×</button>
							</div>
						</div>
						<button 
							@click="service.includes.push('')"
							type="button" 
							class="text-xs font-semibold text-blue-600 hover:text-blue-800"
						>
							+ Agregar elemento
						</button>
					</div>

					<!-- Documentos -->
					<div>
						<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Documentos necesarios</label>
						<p class="text-xs text-slate-500 mb-2">Documentos que debe traer el paciente.</p>
						<div class="space-y-2 mb-2">
							<div v-for="(doc, i) in service.docs" :key="i" class="flex gap-2">
								<input 
									v-model="service.docs[i]"
									type="text" 
									class="flex-grow text-sm border-slate-200 rounded-md"
								>
								<button @click="service.docs.splice(i, 1)" type="button" class="text-slate-400 hover:text-red-500">×</button>
							</div>
						</div>
						<button 
							@click="service.docs.push('')"
							type="button" 
							class="text-xs font-semibold text-blue-600 hover:text-blue-800"
						>
							+ Agregar documento
						</button>
					</div>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
					<!-- Medicamentos -->
					<div>
						<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Medicamentos a suspender</label>
						<p class="text-xs text-slate-500 mb-2">Medicamentos a suspender antes del estudio.</p>
						<div class="space-y-2 mb-2">
							<div v-for="(med, i) in service.stop_meds" :key="i" class="flex gap-2">
								<input 
									v-model="service.stop_meds[i]"
									type="text" 
									class="flex-grow text-sm border-slate-200 rounded-md"
								>
								<button @click="service.stop_meds.splice(i, 1)" type="button" class="text-slate-400 hover:text-red-500">×</button>
							</div>
						</div>
						<button 
							@click="service.stop_meds.push('')"
							type="button" 
							class="text-xs font-semibold text-blue-600 hover:text-blue-800"
						>
							+ Agregar indicación
						</button>
					</div>

					<!-- Links -->
					<div>
						<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Links útiles</label>
						<p class="text-xs text-slate-500 mb-2">Links para preparación, consentimientos, etc.</p>
						<div class="space-y-2 mb-2">
							<div v-for="(link, i) in service.links" :key="i" class="grid grid-cols-2 gap-2 p-2 bg-slate-50 rounded-md">
								<input v-model="link.label" type="text" placeholder="Etiqueta" class="text-xs border-slate-200 rounded-md">
								<div class="flex gap-1">
									<input v-model="link.url" type="text" placeholder="URL" class="flex-grow text-xs border-slate-200 rounded-md">
									<button @click="service.links.splice(i, 1)" type="button" class="text-slate-400 hover:text-red-500">×</button>
								</div>
							</div>
						</div>
						<button 
							@click="service.links.push({ label: '', url: '' })"
							type="button" 
							class="text-xs font-semibold text-blue-600 hover:text-blue-800"
						>
							+ Agregar link
						</button>
					</div>
				</div>

				<!-- Configuración Técnica -->
				<div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-6 border-t border-slate-100">
					<div>
						<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Duración aprox. (min)</label>
						<input 
							v-model="service.duration"
							type="number" 
							min="5" max="480" step="5"
							class="w-full text-sm border-slate-200 rounded-md focus:ring-blue-500"
						>
					</div>
					<div>
						<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Tipo de precio</label>
						<select 
							v-model="service.pricing_type"
							class="w-full text-sm border-slate-200 rounded-md focus:ring-blue-500"
						>
							<option value="fixed">Precio fijo</option>
							<option value="quote">Cotización</option>
						</select>
					</div>
					<div v-if="service.pricing_type === 'fixed'">
						<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Precio aprox. ($)</label>
						<input 
							v-model="service.price"
							type="number" 
							min="0" step="50"
							class="w-full text-sm border-slate-200 rounded-md focus:ring-blue-500"
						>
					</div>
					<div v-else class="md:col-span-1">
						<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Notas de cotización</label>
						<p class="text-xs text-slate-500 italic">El precio se define bajo consulta.</p>
					</div>
				</div>

				<!-- Ayuno y llegada -->
				<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
					<div class="flex items-center pt-6">
						<input 
							v-model="service.fasting.required"
							type="checkbox" 
							class="h-4 w-4 text-blue-600 border-slate-300 rounded focus:ring-blue-500"
						>
						<label class="ml-2 text-sm text-slate-700 font-medium">Requiere ayuno</label>
					</div>
					<div v-if="service.fasting.required">
						<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Horas de ayuno</label>
						<input 
							v-model="service.fasting.hours"
							type="number" 
							min="1" max="24" step="1"
							class="w-full text-sm border-slate-200 rounded-md focus:ring-blue-500"
						>
					</div>
					<div :class="service.fasting.required ? '' : 'md:col-span-2'">
						<label class="block text-xs font-bold text-blue-900 uppercase mb-1">Llegar antes (minutos)</label>
						<input 
							v-model="service.arrival_minutes"
							type="number" 
							min="0" max="120" step="5"
							class="w-full text-sm border-slate-200 rounded-md focus:ring-blue-500"
						>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
