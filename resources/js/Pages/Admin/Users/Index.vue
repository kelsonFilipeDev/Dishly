<template>
  <AdminLayout>
    <div>
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-orange-700">Gestão de Utilizadores</h2>
        <button
          @click="openCreateModal"
          class="bg-[#B55233] hover:bg-[#5B3228] text-white px-4 py-2 rounded-lg transition"
        >
          Novo Utilizador
        </button>
      </div>

      <div class="bg-white shadow-md rounded-xl overflow-hidden">
        <table class="min-w-full">
          <thead class="bg-[#FFE6B4] text-[#5B3228]">
            <tr>
              <th class="px-6 py-3 text-left text-sm font-semibold">Nome</th>
              <th class="px-6 py-3 text-left text-sm font-semibold">Email</th>
              <th class="px-6 py-3 text-left text-sm font-semibold">Função</th>
              <th class="px-6 py-3 text-left text-sm font-semibold">Ações</th>
            </tr>
          </thead>
          <tbody>
            <tr
              v-for="user in users"
              :key="user.id"
              class="border-t hover:bg-orange-50 transition"
            >
              <td class="px-6 py-3">{{ user.name }}</td>
              <td class="px-6 py-3">{{ user.email }}</td>
              <td class="px-6 py-3 capitalize">{{ user.role }}</td>
              <td class="px-6 py-3 space-x-2">
                <button
                  @click="openEditModal(user)"
                  class="text-blue-600 hover:underline"
                >
                  Editar
                </button>
                <button
                  @click="confirmDelete(user.id)"
                  class="text-red-600 hover:underline"
                >
                  Eliminar
                </button>
              </td>
            </tr>
            <tr v-if="users.length === 0">
              <td colspan="4" class="text-center text-gray-500 py-6">
                Nenhum utilizador encontrado.
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <UserModal
        v-if="showModal"
        :user="selectedUser"
        :mode="modalMode"
        @close="closeModal"
        @saved="handleSavedUser"
      />
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/Admin/AdminLayout.vue'
import UserModal from '@/Components/Admin/Users/UserModal.vue'
import { usePage, router } from '@inertiajs/vue3'
import { ref } from 'vue'

const { props } = usePage()
const users = ref([...props.users]) // clonar para evitar mutação direta do prop

const showModal = ref(false)
const selectedUser = ref(null)
const modalMode = ref('create')

const openCreateModal = () => {
  selectedUser.value = null
  modalMode.value = 'create'
  showModal.value = true
}

const openEditModal = (user) => {
  selectedUser.value = user
  modalMode.value = 'edit'
  showModal.value = true
}

const closeModal = () => {
  showModal.value = false
  selectedUser.value = null
}

// Atualiza a lista de utilizadores localmente
const handleSavedUser = ({ user, form }) => {
  if (modalMode.value === 'edit') {
    const index = users.value.findIndex(u => u.id === user.id)
    if (index !== -1) {
      users.value[index] = { ...users.value[index], ...form }
    }
  } else if (modalMode.value === 'create') {
    users.value.push({ ...form, id: Date.now() }) // id temporário
  }
  closeModal()
}

const confirmDelete = async (id) => {
  if (confirm('Tem a certeza que deseja eliminar este utilizador?')) {
    await router.delete(`/admin/users/${id}`, {
      onSuccess: () => {
        users.value = users.value.filter(u => u.id !== id)
      }
    })
  }
}
</script>

<style scoped>
table {
  font-family: 'Segoe UI', sans-serif;
}
</style>
