<template>
  <div class="min-h-screen bg-[#FFE6B4] flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-md">
      <!-- Logo / Título -->
      <div class="flex justify-center mb-6">
        <div class="w-20 h-20 bg-[#FF9E4F] rounded-full flex items-center justify-center text-white text-2xl font-bold">
          ADM
        </div>
      </div>

      <h2 class="text-2xl font-bold text-[#5B3228] text-center mb-6">Login do Administrador</h2>

      <form @submit.prevent="submit">
        <!-- Email -->
        <div class="mb-4">
          <label for="email" class="block text-[#5B3228] mb-1">Email</label>
          <input
            id="email"
            v-model="form.email"
            type="email"
            placeholder="Digite o email"
            class="w-full px-4 py-2 border border-[#B55233] rounded focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
            autofocus
          />
          <p v-if="form.errors.email" class="text-red-500 text-sm mt-1">{{ form.errors.email }}</p>
        </div>

        <!-- Senha -->
        <div class="mb-4">
          <label for="password" class="block text-[#5B3228] mb-1">Senha</label>
          <input
            id="password"
            v-model="form.password"
            type="password"
            placeholder="Digite a sua senha"
            class="w-full px-4 py-2 border border-[#B55233] rounded focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
          />
          <p v-if="form.errors.password" class="text-red-500 text-sm mt-1">{{ form.errors.password }}</p>
        </div>

        <!-- Senha Default do Sistema -->
        <div class="mb-6">
          <label for="default_password" class="block text-[#5B3228] mb-1">Senha do Sistema</label>
          <input
            id="default_password"
            v-model="form.default_password"
            type="password"
            placeholder="Senha definida no sistema"
            class="w-full px-4 py-2 border border-[#B55233] rounded focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
          />
          <p v-if="form.errors.default_password" class="text-red-500 text-sm mt-1">{{ form.errors.default_password }}</p>
        </div>

        <!-- Botão -->
        <button
          type="submit"
          class="w-full bg-[#FF9E4F] text-white font-bold py-2 rounded hover:bg-[#B55233] transition duration-300"
          :disabled="form.processing"
        >
          Entrar
        </button>
        <div class="mt-4 text-center">
          <span class="text-[#5B3228]">Não possui conta?</span>
          <Link href="/admin/create" class="text-blue-500 hover:underline ml-1">Criar conta</Link>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

const form = useForm({
  email: '',
  password: '',
  default_password: '',
})

const submit = () => {
  form.post(route('admin.login.store'), {
    onFinish: () => form.reset('password', 'default_password'),
  })
}
</script>

<style scoped>
body {
  font-family: 'Inter', sans-serif;
}
</style>
