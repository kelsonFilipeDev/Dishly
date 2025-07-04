<template>
  <AdminLayout>
    <div class="p-6 space-y-6">
      <div class="mb-4">
        <h1 class="text-2xl font-bold text-[#5B3228]">Relatórios</h1>
        <p class="text-gray-600">Aceda aos relatórios disponíveis abaixo.</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        <ReportCard
          title="Receitas por Cozinheiro"
          description="Visualize as receitas criadas por cada cozinheiro."
          @click="navigateTo('receitas-cozinheiro')"
        />

        <ReportCard
          title="Detalhes de Receita"
          description="Veja os detalhes individuais de uma receita."
          @click="navigateTo('detalhes-receita')"
        />

        <ReportCard
          title="Testes de Degustação"
          description="Relatório completo dos testes realizados."
          @click="navigateTo('testes-degustacao')"
        />

        <ReportCard
          title="Receitas por Período"
          description="Filtre receitas por dia, semana ou mês."
          @click="navigateTo('receitas-periodo')"
        />

        <ReportCard
          title="Histórico dos Cozinheiros"
          description="Consulte o percurso profissional dos cozinheiros."
          @click="navigateTo('historico-cozinheiro')"
        />

        <ReportCard
          title="Relatório Completo"
          description="Saiba tudo que aconteceu no sistema ordenado por data."
          @click="navigateTo('relatorio-completo')"
        />
      </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue'
import ReportCard from '@/Components/Admin/Reports/ReportCard.vue'
import { router } from '@inertiajs/vue3'

const navigateTo = (path) => {
  router.visit(`/admin/relatorios/${path}`)
}
</script>
