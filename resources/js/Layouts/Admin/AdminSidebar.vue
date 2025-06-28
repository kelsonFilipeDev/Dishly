<template>
  <aside class="bg-[#FF9E4F] text-white w-64 min-h-screen p-6 flex flex-col">
    <div>
      <h1 class="text-3xl font-bold mb-2">Dislhy</h1>
      <h2 class="text-lg font-medium mb-6">Painel Administrativo</h2>
    </div>

    <nav class="flex-1">
      <ul class="space-y-2">
        <li v-for="item in navItems" :key="item.name">
          <Link
            :href="item.href"
            class="flex items-center px-4 py-2 rounded-md transition-all duration-300"
            :class="{
              'bg-white text-[#FF9E4F] font-semibold shadow-md': isActive(item.href),
              'hover:bg-[#FFE6B4] hover:text-[#B55233]': !isActive(item.href)
            }"
          >
            <span class="text-base">{{ item.name }}</span>
          </Link>
        </li>
      </ul>
    </nav>
  </aside>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const navItems = [
  { name: 'Gestão de Utilizadores', href: '/admin/users' },
  { name: 'Relatórios', href: '/admin/relatorios' },
  { name: 'Configurações', href: '/admin/configuracoes' },
  { name: 'Sair', href: '/logout' }
]

const page = usePage()

const isActive = (href) => {
  return page.url.startsWith(href)
}
</script>

<style scoped>
aside {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
</style>
