<template>
  <AdminLayout>
    <div class="p-6 space-y-6">
      <div class="mb-4">
        <h1 class="text-2xl font-bold text-[#5B3228]">Relatório: Receitas por Cozinheiro</h1>
        <p class="text-gray-600">Selecione um cozinheiro para visualizar as receitas associadas.</p>
      </div>

      <div class="bg-white p-4 rounded-xl shadow-md space-y-4">
        <label for="cozinheiro" class="block text-sm font-medium text-gray-700">Cozinheiro</label>
        <select
          id="cozinheiro"
          v-model="selectedChef"
          :class="['w-full px-4 py-2 border rounded focus:outline-none focus:ring-2', error ? 'border-red-500 focus:ring-red-400' : 'focus:ring-[#FF9E4F]']"
        >
          <option value="" disabled>-- Selecione --</option>
          <option
            v-for="chef in props.cozinheiros"
            :key="chef.id"
            :value="chef.id"
          >
            {{ chef.name }}
          </option>
          <option value="all">Todos os Cozinheiros</option>
        </select>

        <!-- MENSAGEM DE ERRO -->
        <p v-if="error" class="text-red-500 text-sm">Por favor, selecione um cozinheiro válido.</p>

        <div class="flex gap-2">
          <button
            @click="gerarRelatorio"
            class="bg-[#B55233] hover:bg-[#5B3228] text-white px-4 py-2 rounded transition"
          >
            Gerar Relatório
          </button>
          <button
            v-if="receitas.length"
            @click="exportarPdf"
            class="bg-[#FF9E4F] hover:bg-[#B55233] text-white px-4 py-2 rounded transition"
          >
            Exportar PDF
          </button>
        </div>
      </div>

      <div v-if="receitas.length" class="mt-6">
        <h2 class="text-lg font-semibold text-[#5B3228] mb-2">Receitas do Cozinheiro</h2>
        <table class="min-w-full bg-white rounded-xl shadow-md">
          <thead class="bg-[#FFE6B4] text-[#5B3228]">
            <tr>
              <th class="px-4 py-2 text-left text-sm">Nome da Receita</th>
              <th class="px-4 py-2 text-left text-sm">Categoria</th>
              <th class="px-4 py-2 text-left text-sm">Data de Criação</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="receita in receitas" :key="receita.id" class="border-t hover:bg-orange-50">
              <td class="px-4 py-2">{{ receita.nome }}</td>
              <td class="px-4 py-2">{{ receita.categoria }}</td>
              <td class="px-4 py-2">{{ receita.data }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div v-else class="text-sm text-gray-500 mt-4">Nenhum relatório gerado ainda.</div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue'
import { router } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps({
  cozinheiros: Array,
  receitas: Array,
  selectedChef: [String, Number, null]
})

const selectedChef = ref(props.selectedChef || '')
const receitas = ref(props.receitas || [])
const error = ref(false)

const gerarRelatorio = () => {
  if (!selectedChef.value) {
    error.value = true
    return
  }
  error.value = false
  router.visit(route('admin.relatorios.receitas_cozinheiro'), {
    method: 'get',
    data: { cozinheiro_id: selectedChef.value }
  })
}

const exportarPdf = () => {
  const url = route('admin.relatorios.receitas_cozinheiro', {
    cozinheiro_id: selectedChef.value || 'all',
    export: 'pdf'
  })
  window.open(url, '_blank')
}
</script>

<style scoped>
table {
  font-family: 'Segoe UI', sans-serif;
}
</style>
