<template>
  <div
    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
    @click.self="close"
  >
    <div class="bg-white rounded-xl w-full max-w-md p-6 shadow-xl relative">
      <h2 class="text-xl font-bold text-[#B55233] mb-4">
        {{ mode === 'edit' ? 'Editar Utilizador' : 'Novo Utilizador' }}
      </h2>

      <form @submit.prevent="submit">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
          <input
            v-model="form.name"
            type="text"
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
          />
          <p v-if="errors.name" class="text-sm text-red-600 mt-1">{{ errors.name }}</p>
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <input
            v-model="form.email"
            type="email"
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
          />
          <p v-if="errors.email" class="text-sm text-red-600 mt-1">{{ errors.email }}</p>
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-1">Função</label>
          <select
            v-model="form.role"
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
          >
            <option value="utilizador_final">Utilizador Final</option>
            <option value="cozinheiro">Cozinheiro</option>
            <option value="degustador">Degustador</option>
            <option value="editor">Editor</option>
          </select>
          <p v-if="errors.role" class="text-sm text-red-600 mt-1">{{ errors.role }}</p>
        </div>

        <div v-if="mode === 'create'" class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-1">Senha</label>
          <input
            v-model="form.password"
            type="password"
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
          />
          <p v-if="errors.password" class="text-sm text-red-600 mt-1">{{ errors.password }}</p>
        </div>

        <div v-if="mode === 'create'" class="mb-4">
          <label class="block text-sm font-medium text-gray-700 mb-1">Confirmar Senha</label>
          <input
            v-model="form.password_confirmation"
            type="password"
            class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-[#FF9E4F]"
            required
          />
        </div>

        <div class="flex justify-end gap-2">
          <button
            type="button"
            @click="close"
            class="px-4 py-2 text-sm text-gray-600 bg-gray-100 rounded hover:bg-gray-200"
          >
            Cancelar
          </button>

          <button
            type="submit"
            :disabled="loading"
            class="px-4 py-2 text-sm text-white bg-[#B55233] hover:bg-[#5B3228] rounded disabled:opacity-50"
          >
            {{ loading ? (mode === 'edit' ? 'A atualizar...' : 'A criar...') : 'Guardar' }}
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref, watch, reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  user: Object,
  mode: String,
  onClose: Function
})

const emit = defineEmits(['saved'])

const loading = ref(false)
const errors = ref({})

const form = reactive({
  name: '',
  email: '',
  role: '',
  password: '',
  password_confirmation: ''
})

watch(
  () => props.user,
  (newUser) => {
    if (props.mode === 'edit' && newUser) {
      form.name = newUser.name || ''
      form.email = newUser.email || ''
      form.role = newUser.role || ''
    } else {
      form.name = ''
      form.email = ''
      form.role = ''
      form.password = ''
      form.password_confirmation = ''
    }
    errors.value = {}
  },
  { immediate: true }
)

const submit = () => {
  loading.value = true
  errors.value = {}

  const url = props.mode === 'edit'
    ? `/admin/users/${props.user.id}`
    : '/admin/users'

  const method = props.mode === 'edit' ? 'put' : 'post'

  router[method](url, form, {
    onError: (err) => {
      errors.value = err
    },
    onSuccess: () => {
      emit('saved', {
        user: props.user,
        form: { ...form }
      })
      close()
    },
    onFinish: () => {
      loading.value = false
    }
  })
}

const close = () => {
  if (props.onClose) props.onClose()
}
</script>

<style scoped>
label {
  font-family: 'Segoe UI', sans-serif;
}
</style>
