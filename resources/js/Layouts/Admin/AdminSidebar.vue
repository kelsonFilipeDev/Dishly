<template>
  <aside class="bg-[#FF9E4F] text-white w-64 min-h-screen p-6 shadow-lg flex flex-col justify-between">
    <div>
      <!-- Logo -->
      <div class="mb-8">
        <h1 class="text-3xl font-bold tracking-wide">Dislhy</h1>
        <p class="text-sm text-orange-100">Painel Administrativo</p>
      </div>

      <!-- Navegação -->
      <nav>
        <ul class="space-y-2">
          <li v-for="item in menuItems" :key="item.name">
            <Link
              :href="item.href"
              class="block px-4 py-3 rounded-lg text-lg font-medium transition-all duration-300"
              :class="{
                'bg-white text-[#FF9E4F] shadow-md': isActive(item.href),
                'hover:bg-[#FFE6B4] hover:text-[#5B3228]': !isActive(item.href)
              }"
            >
              {{ item.name }}
            </Link>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const page = usePage()

const menuItems = [
  { name: 'Opção 1', href: '/admin/opcao1' },
  { name: 'Opção 2', href: '/admin/opcao2' },
  { name: 'Opção 3', href: '/admin/opcao3' }
]

const isActive = (href) => {
  return page.url.startsWith(href)
}
</script>
