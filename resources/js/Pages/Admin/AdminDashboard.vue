<template>
  <div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-xl p-6">
      <h1 class="text-3xl font-bold text-orange-700 mb-6">Painel do Administrador</h1>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="bg-orange-100 p-4 rounded-lg shadow hover:shadow-lg transition">
          <h2 class="text-xl font-semibold text-orange-600 mb-2">Utilizadores</h2>
          <p class="text-gray-700">Gerir contas de utilizadores registados.</p>
        </div>

        <div class="bg-orange-100 p-4 rounded-lg shadow hover:shadow-lg transition">
          <h2 class="text-xl font-semibold text-orange-600 mb-2">Relatórios</h2>
          <p class="text-gray-700">Visualizar estatísticas e relatórios do sistema.</p>
        </div>

        <div class="bg-orange-100 p-4 rounded-lg shadow hover:shadow-lg transition">
          <h2 class="text-xl font-semibold text-orange-600 mb-2">Configurações</h2>
          <p class="text-gray-700">Alterar definições do sistema e preferências.</p>
        </div>

        <div class="bg-orange-100 p-4 rounded-lg shadow hover:shadow-lg transition">
          <h2 class="text-xl font-semibold text-orange-600 mb-2">Sair</h2>
          <button @click="logout" class="text-red-500 font-semibold mt-1 hover:underline">
            Terminar sessão
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { router } from '@inertiajs/vue3'
import axios from 'axios'

const logout = async () => {
  try {
    await axios.post('/logout')
    router.visit('/admin/login') // redirecionar após logout
  } catch (error) {
    console.error('Erro ao terminar sessão:', error)
  }
}
</script>
