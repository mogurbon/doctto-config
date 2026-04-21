<script setup>
const model = defineModel({
	type: Object,
	default: () => ({})
});
</script>

<template>
	<div>
		<div class="mb-5">
			<h3 class="text-lg font-semibold text-gray-900">Servicios</h3>
			<p class="text-sm text-gray-500">Configura el catálogo de servicios: nombre, duración, precio y requisitos。</p>
		</div>
		<div class="border border-gray-200 rounded-lg overflow-hidden mb-6">
			<div class="bg-slate-50 px-4 py-2 border-b border-gray-200 flex justify-between items-center">
				<span class="text-xs font-bold text-gray-500 uppercase">Servicio</span>
				<span class="text-xs font-bold text-gray-500 uppercase">Acción</span>
			</div>
			<div class="divide-y divide-gray-200">
				<div class="px-4 py-3 flex justify-between items-center bg-slate-50">
					<div>
						<p class="text-sm font-medium text-gray-900">Consulta General</p>
						<p class="text-xs text-gray-500">30 min • $800.00 MXN</p>
					</div>
					<button type="button" class="text-cyan-500 hover:text-cyan-900 text-sm font-medium italic underline">Editar</button>
				</div>
			</div>
		</div>
		<button type="button" class="inline-flex items-center px-3 py-1.5 border border-cyan-500 text-cyan-500 rounded-md text-sm font-medium hover:bg-cyan-50 mb-4">
			+ Agregar servicio
		</button>
	</div>
</template>
