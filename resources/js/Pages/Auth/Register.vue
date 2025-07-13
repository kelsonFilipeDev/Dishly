<template>
  <div class="min-h-screen flex items-center justify-center bg-[#FFE5B4]">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
      <!-- Logo Placeholder -->
      <div class="flex justify-center mb-6">
        <Link>
          <div class="w-20 h-20 bg-[#FF9E4F] rounded-full flex items-center justify-center text-white text-2xl font-bold">
            LOGO
          </div>
        </Link>
      </div>

      <h2 class="text-2xl font-semibold text-[#5B3228] mb-6 text-center">Criar Conta</h2>

      <form @submit.prevent="register">
        <div class="mb-4">
          <label for="name" class="block text-[#5B3228] mb-1">Nome</label>
          <input
            type="text"
            id="name"
            v-model="form.name"
            class="w-full px-4 py-2 rounded-lg border border-[#B55233] focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
          />
        </div>

        <div class="mb-4">
          <label for="email" class="block text-[#5B3228] mb-1">Email</label>
          <input
            type="email"
            id="email"
            v-model="form.email"
            class="w-full px-4 py-2 rounded-lg border border-[#B55233] focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
          />
        </div>

        <div class="mb-4">
          <label for="password" class="block text-[#5B3228] mb-1">Palavra-passe</label>
          <input
            type="password"
            id="password"
            v-model="form.password"
            class="w-full px-4 py-2 rounded-lg border border-[#B55233] focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
          />
        </div>

        <div class="mb-6">
          <label for="password_confirmation" class="block text-[#5B3228] mb-1">Confirmar Palavra-passe</label>
          <input
            type="password"
            id="password_confirmation"
            v-model="form.password_confirmation"
            class="w-full px-4 py-2 rounded-lg border border-[#B55233] focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
          />
        </div>

        <button
          type="submit"
          class="w-full bg-[#FF9E4F] hover:bg-[#B55233] text-white font-bold py-2 rounded-lg transition duration-300"
        >
          Criar Conta
        </button>
        <div class="mt-4 text-center">
          <span class="text-[#5B3228]">Já possui conta?</span>
          <a href="/login" class="text-blue-500 hover:underline ml-1">Logar</a>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
  import { ref } from 'vue'
  import axios from 'axios'
  import { Link, usePage } from '@inertiajs/vue3'

  // Captura o token CSRF da tag <meta name="csrf-token"> no HTML Blade
  const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
  axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken

  const form = ref({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
  })

  const register = async () => {
    try {
      const response = await axios.post('/register', form.value)
      console.log('Utilizador criado:', response.data)
      // Redireciona para o dashboard ou home após sucesso
      window.location.href = 'dashboard'
    } catch (error) {
      console.error('Erro no registro:', error.response?.data ?? error.message)
      alert('Erro ao criar conta. Verifica os dados ou tenta novamente.')
    }
  }
</script>

<style scoped>
  body {
    font-family: 'Inter', sans-serif;
  }
</style>
