<template>
  <PublicLayout>
    <HeaderPublic />
    <Head title="Início" />
    <div class="flex flex-col justify-center items-center text-[#5B3228] px-4 py-10 min-h-screen">
      <h1 class="text-4xl md:text-5xl font-extrabold mb-6 text-center">
        Bem-vindo ao <span class="text-[#B55233]">Dishly</span>
      </h1>
      <p class="text-lg md:text-xl mb-8 text-center max-w-2xl">
        A plataforma onde cozinheiros, degustadores e editores se encontram para transformar receitas em experiências inesquecíveis.
      </p>
      <button as="a" href="/login">Entrar no Sistema</button>
    </div>
  </PublicLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/Public/PublicLayout.vue';
import HeaderPublic from '@/Components/Public/HeaderPublic.vue';
//import Button from '@/Components/Shared/Button.vue'
</script>
