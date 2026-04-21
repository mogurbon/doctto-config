<script setup>
import { ref } from 'vue';

const model = defineModel({
	type: Object,
	required: true
});

const activeDay = ref('lunes');
</script>

<template>
	<div>
		<div class="mb-5">
			<h3 class="text-lg font-semibold text-gray-900">Horarios de atención</h3>
			<p class="text-sm text-gray-500">Define en qué días y horarios atiende este médico.</p>
		</div>
		<div class="border-b border-gray-200 mb-4">
			<nav class="-mb-px flex space-x-4 overflow-x-auto">
				<button @click="activeDay = 'lunes'" type="button" class="py-2 px-1 border-b-2 font-medium text-sm transition-colors focus:outline-none" :class="activeDay === 'lunes' ? 'border-cyan-500 text-cyan-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">Lunes</button>
				<button @click="activeDay = 'martes'" type="button" class="py-2 px-1 border-b-2 font-medium text-sm transition-colors focus:outline-none" :class="activeDay === 'martes' ? 'border-cyan-500 text-cyan-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover;border-gray-300'">Martes</button>
				<button @click="activeDay = 'miercoles'" type="button" class="py-2 px-1 border-b-2 font-medium text-sm transition-colors focus:outline-none" :class="activeDay === 'miercoles' ? 'border-cyan-500 text-cyan-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover;border-gray-300'">Miércoles</button>
				<button @click="activeDay = 'jueves'" type="button" class="py-2 px-1 border-b-2 font-medium text-sm transition-colors focus:outline-none" :class="activeDay === 'jueves' ? 'border-cyan-500 text-cyan-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover;border-gray-300'">Jueves</button>
				<button @click="activeDay = 'viernes'" type="button" class="py-2 px-1 border-b-2 font-medium text-sm transition-colors focus:outline-none" :class="activeDay === 'viernes' ? 'border-cyan-500 text-cyan-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover;border-gray-300'">Viernes</button>
			</nav>
		</div>

		<div v-if="activeDay" class="bg-slate-50 p-4 rounded-lg border border-gray-200 mb-6">
			<div class="flex items-center justify-between mb-4">
				<label class="relative inline-flex items-center cursor-pointer">
					<input type="checkbox" checked class="sr-only peer">
					<div class="w-11 h-6 bg-gray-200 peer-focus:ring-cyan-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-slate-50 after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-slate-50 after:border-gray-200 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-cyan-500"></div>
					<span class="ml-3 text-sm font-semibold text-gray-900">¿Abre este día? ({{ activeDay.charAt(0).toUpperCase() + activeDay.slice(1) }})</span>
				</label>
			</div>

			<div v-if="Array.isArray(model[activeDay])">
				<div v-for="(block, idx) in model[activeDay]" :key="idx" class="flex items-center gap-3 mb-3">
					<span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-slate-50 border border-gray-200 text-gray-700">Bloque {{ idx + 1 }}</span>
					<div class="flex items-center">
						<span class="text-sm text-gray-500 mr-2">Inicio</span>
						<input type="time" v-model="block.start" class="border-gray-200 rounded-md shadow-sm sm:text-sm">
					</div>
					<div class="flex items-center">
						<span class="text-sm text-gray-500 mr-2">Fin</span>
						<input type="time" v-model="block.end" class="border-gray-200 rounded-md shadow-sm sm:text-sm">
					</div>
					<button type="button" @click="model[activeDay].splice(idx, 1)" class="text-red-500 hover:text-red-700 p-1">
						<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
					</button>
				</div>
			</div>

			<div class="mt-4">
				<button type="button" @click="model[activeDay].push({ start: '09:00', end: '18:00' })" class="text-sm text-cyan-500 font-medium">+ Añadir bloque</button>
			</div>
		</div>
	</div>
</template>
