<template>
  <AdminLayout>
    <div>
      <h2 class="text-2xl font-bold text-orange-700 mb-4">Dashboard</h2>
      <p class="text-gray-700">Aqui vão aparecer os dados e ações da opção selecionada.</p>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue'
import { router } from '@inertiajs/vue3'
import axios from 'axios'

const logout = async () => {
  try {
    await axios.post('/logout')
    router.visit('/admin/login')
  } catch (error) {
    console.error('Erro ao terminar sessão:', error)
  }
}
</script>
