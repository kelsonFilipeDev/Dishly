<template>
  <div class="min-h-screen bg-orange-100 flex items-center justify-center">
    <div class="bg-white p-6 rounded-xl shadow-xl w-full max-w-md">
      <div class="flex justify-center mb-6">
        <div class="w-20 h-20 bg-[#FF9E4F] rounded-full flex items-center justify-center text-white text-2xl font-bold">
          ADM
        </div>
      </div>

      <h2 class="text-2xl font-bold mb-4 text-[#5B3228] text-center">Registo de Administrador</h2>

      <form @submit.prevent="register">
        <input
          type="text"
          v-model="form.name"
          placeholder="Nome completo"
          class="w-full px-4 py-2 border rounded mb-2 focus:outline-none focus:ring-2 focus:ring-orange-400"
          required
        />
        <p v-if="fieldErrors.name" class="text-red-600 text-sm mb-2">{{ fieldErrors.name }}</p>

        <input
          type="email"
          v-model="form.email"
          placeholder="Email"
          class="w-full px-4 py-2 border rounded mb-2 focus:outline-none focus:ring-2 focus:ring-orange-400"
          required
        />
        <p v-if="fieldErrors.email" class="text-red-600 text-sm mb-2">{{ fieldErrors.email }}</p>

        <input
          type="password"
          v-model="form.password"
          placeholder="Palavra-passe"
          class="w-full px-4 py-2 border rounded mb-2 focus:outline-none focus:ring-2 focus:ring-orange-400"
          required
        />
        <p v-if="fieldErrors.password" class="text-red-600 text-sm mb-2">{{ fieldErrors.password }}</p>

        <input
          type="password"
          v-model="form.password_confirmation"
          placeholder="Confirmar palavra-passe"
          class="w-full px-4 py-2 border rounded mb-4 focus:outline-none focus:ring-2 focus:ring-orange-400"
          required
        />

        <button
          type="submit"
          :disabled="loading"
          class="w-full bg-orange-600 text-white py-2 rounded hover:bg-orange-700 disabled:opacity-50"
        >
          {{ loading ? 'A criar...' : 'Criar Administrador' }}
        </button>

        <div class="mt-4 text-center">
          <span class="text-[#5B3228]">Já possui conta?</span>
          <Link href="/admin/login" class="text-blue-500 hover:underline ml-1">Logar</Link>
        </div>

        <div class="mt-4 text-center">
          <p v-if="successMessage" class="text-green-600 font-semibold">{{ successMessage }}</p>
          <p v-if="errorMessage" class="text-red-600 font-semibold">{{ errorMessage }}</p>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'
import { ref } from 'vue'
import axios from 'axios'

const form = ref({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
})

const successMessage = ref('')
const errorMessage = ref('')
const fieldErrors = ref({})
const loading = ref(false)

const register = async () => {
  if (form.value.password !== form.value.password_confirmation) {
    errorMessage.value = 'As palavras-passe não coincidem.'
    successMessage.value = ''
    return
  }

  loading.value = true
  errorMessage.value = ''
  fieldErrors.value = {}

  try {
    const response = await axios.post('/admin/create', form.value)

    successMessage.value = response.data.message
    errorMessage.value = ''
    form.value = {
      name: '',
      email: '',
      password: '',
      password_confirmation: '',
    }

    router.visit('/admin/dashboard')
  } catch (error) {
    successMessage.value = ''
    if (error.response?.status === 422 && error.response.data.errors) {
      fieldErrors.value = error.response.data.errors
    } else {
      errorMessage.value = error.response?.data?.message || 'Erro no registo.'
    }
  } finally {
    loading.value = false
  }
}
</script>

<script>
export default {
  components: {
    Link: () => import('@inertiajs/vue3').then(mod => mod.Link),
  }
}
</script>
