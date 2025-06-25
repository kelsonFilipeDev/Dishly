<template>
  <div class="flex min-h-screen bg-[#FFE6B4] text-[#5B3228]">
    <!-- Sidebar -->
    <AdminSidebar class="hidden lg:block" />

    <!-- Conteúdo principal -->
    <div class="flex flex-col flex-1">
      <!-- Topbar -->
      <AdminTopbar />

      <!-- Área dinâmica -->
      <main class="flex-1 p-4 md:p-6 bg-white rounded-tl-3xl shadow-inner transition-all duration-300">
        <slot />
      </main>
    </div>
  </div>
</template>

<script setup>
import AdminSidebar from './AdminSidebar.vue'
import AdminTopbar from './AdminTopbar.vue'
</script>
