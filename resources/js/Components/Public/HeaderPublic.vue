<template>
  <header class="bg-[#FFE6B4] shadow-md">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <!-- LOGO -->
      <div class="text-2xl font-bold text-[#5B3228] tracking-wide">
        Dishly
      </div>

      <!-- MENU DE NAVEGAÇÃO -->
      <nav class="hidden md:flex space-x-6 text-[#5B3228] font-medium">
        <a href="/" class="hover:text-[#B55233] transition">Início</a>
        <a href="/sobre" class="hover:text-[#B55233] transition">Sobre</a>
        <a href="/receitas" class="hover:text-[#B55233] transition">Receitas</a>
        <a href="/contactos" class="hover:text-[#B55233] transition">Contactos</a>
      </nav>

      <!-- BOTÃO DE LOGIN -->
      <div>
        <a
          href="/login"
          class="bg-[#B55233] text-white px-4 py-2 rounded-lg hover:bg-[#5B3228] transition"
        >
          Entrar
        </a>
      </div>
    </div>
  </header>
</template>

<script setup>
// Nenhuma lógica por agora — componente puramente visual
</script>

<style scoped>
/* Estilo adicional opcional aqui */
</style>
