<template>
  <div class="min-h-screen flex items-center justify-center bg-[#FFE5B4]">
    <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-xl">
      <!-- Logo -->
      <div class="flex justify-center mb-6">
        <div class="w-20 h-20 bg-[#FF9E4F] rounded-full flex items-center justify-center text-white text-2xl font-bold">
          LOGO
        </div>
      </div>

      <h2 class="text-2xl font-semibold text-[#5B3228] mb-6 text-center">Iniciar Sessão</h2>

      <form @submit.prevent="submit">
        <div class="mb-4">
          <label for="email" class="block text-[#5B3228] mb-1">Email</label>
          <input
            id="email"
            v-model="form.email"
            type="email"
            class="w-full px-4 py-2 rounded-lg border border-[#B55233] focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
            autofocus
          />
          <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</p>
        </div>

        <div class="mb-4">
          <label for="password" class="block text-[#5B3228] mb-1">Senha</label>
          <input
            id="password"
            v-model="form.password"
            type="password"
            class="w-full px-4 py-2 rounded-lg border border-[#B55233] focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
          />
          <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">{{ form.errors.password }}</p>
        </div>

        <div class="flex items-center justify-between mb-6">
          <label class="flex items-center text-[#5B3228] text-sm">
            <input type="checkbox" v-model="form.remember" class="mr-2" />
            Lembre-me
          </label>

          <Link v-if="canResetPassword" :href="route('password.request')" class="text-sm text-blue-500 hover:underline">
            Esqueceste a senha?
          </Link>
        </div>

        <button
          type="submit"
          class="w-full bg-[#FF9E4F] hover:bg-[#B55233] text-white font-bold py-2 rounded-lg transition duration-300"
          :disabled="form.processing"
        >
          Entrar
        </button>
        <div class="mt-4 text-center">
            <span class="text-[#5B3228]">Não possui conta?</span>
            <Link href="/register" class="text-blue-500 hover:underline ml-1">Criar conta</Link>
        </div>

      </form>
    </div>
  </div>
</template>

<script setup>
import { Link, Head, useForm } from '@inertiajs/vue3'

const props = defineProps({
  canResetPassword: Boolean,
  status: String,
})

const form = useForm({
  email: '',
  password: '',
  remember: false,
})

const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  })
}
</script>

<style scoped>
body {
  font-family: 'Inter', sans-serif;
}
</style>
