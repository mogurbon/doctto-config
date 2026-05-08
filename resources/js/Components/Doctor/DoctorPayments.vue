<script setup>
const model = defineModel({
	type: Object,
	required: true
});
</script>

<template>
	<div>
		<div class="mb-5">
			<h3 class="text-lg font-semibold text-gray-900">Pagos</h3>
			<p class="text-sm text-gray-500">Métodos, reglas de cobro y meses sin intereses.</p>
		</div>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-2">Métodos de pago aceptados</label>
				<div class="grid grid-cols-2 gap-3">
					<label class="flex items-center space-x-2">
						<input type="checkbox" v-model="model.methods" value="cash" class="w-4 h-4 text-cyan-500 border-gray-200 rounded">
						<span class="text-sm text-gray-600">Efectivo</span>
					</label>
					<label class="flex items-center space-x-2">
						<input type="checkbox" v-model="model.methods" value="card" class="w-4 h-4 text-cyan-500 border-gray-200 rounded">
						<span class="text-sm text-gray-600">Tarjeta</span>
					</label>
					<label class="flex items-center space-x-2">
						<input type="checkbox" v-model="model.methods" value="transfer" class="w-4 h-4 text-cyan-500 border-gray-200 rounded">
						<span class="text-sm text-gray-600">Transferencia</span>
					</label>
				</div>
			</div>
			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-1">Regla de cobro</label>
				<select v-model="model.collection_rule" class="w-full border-gray-200 rounded-md shadow-sm focus:ring-cyan-500 focus:border-cyan-500 sm:text-sm">
					<option value="at_reception">Al llegar a recepción</option>
					<option value="after_consultation">Al finalizar la consulta</option>
				</select>
			</div>
		</div>
	</div>
</template>
