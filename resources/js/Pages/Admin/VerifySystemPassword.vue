<template>
  <div class="min-h-screen bg-orange-100 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">
      <h1 class="text-2xl font-bold mb-4 text-orange-700">🔒 Acesso Restrito</h1>
      <p class="mb-4 text-sm text-gray-600">Introduce a senha do sistema para continuar.</p>

      <form @submit.prevent="submitPassword">
        <input
          type="password"
          v-model="systemPassword"
          placeholder="Senha do sistema..."
          class="w-full px-4 py-2 border rounded mb-4 focus:outline-none focus:ring-2 focus:ring-orange-400"
          required
        />

        <button
          type="submit"
          :disabled="loading"
          class="w-full bg-orange-600 text-white py-2 rounded hover:bg-orange-700 disabled:opacity-50"
        >
          {{ loading ? 'A verificar...' : 'Verificar' }}
        </button>

        <p v-if="errorMessage" class="text-red-500 text-sm mt-3">{{ errorMessage }}</p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const systemPassword = ref('')
const errorMessage = ref('')
const loading = ref(false)

const submitPassword = async () => {
  loading.value = true
  errorMessage.value = ''

  try {
    const response = await axios.post('/admin/verify-password', {
      system_password: systemPassword.value
    })

    if (response.data.status === 'success') {
      router.visit('/admin/create')
    }
  } catch (error) {
    errorMessage.value = error.response?.data?.message || 'Erro desconhecido.'
  } finally {
    loading.value = false
  }
}
</script>
