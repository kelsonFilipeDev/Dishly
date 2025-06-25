<template>
  <header class="flex flex-col sm:flex-row justify-between items-center bg-[#FFE6B4] border-b border-[#FF9E4F] px-6 py-4 shadow-md transition-all duration-300 ease-in-out">
    <h1 class="text-2xl font-bold text-[#5B3228] tracking-wide mb-2 sm:mb-0 animate-fade-in-down">
      Painel do Administrador
    </h1>
    
    <div class="flex items-center space-x-3 text-[#5B3228] animate-fade-in">
      <div class="w-9 h-9 bg-[#FF9E4F] rounded-full flex items-center justify-center text-white font-bold uppercase">
        {{ initials }}
      </div>
      <div class="text-sm font-medium">
        Bem-vindo, administrador <span class="font-bold">{{ user.name }}</span>
      </div>
    </div>
  </header>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const { props } = usePage()
const user = props.auth.user

const initials = computed(() => {
  if (!user?.name) return 'ADM'
  return user.name
    .split(' ')
    .map(word => word.charAt(0).toUpperCase())
    .slice(0, 2)
    .join('')
})
</script>

<style scoped>
@keyframes fade-in {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in {
  animation: fade-in 0.6s ease-out;
}

@keyframes fade-in-down {
  from { opacity: 0; transform: translateY(-20px); }
  to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in-down {
  animation: fade-in-down 0.6s ease-out;
}
</style>
