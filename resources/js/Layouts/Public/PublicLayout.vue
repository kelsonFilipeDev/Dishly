<template>
  <div class="min-h-screen bg-[#FFE6B4] flex flex-col justify-between">
    <slot />
    <Footer />
  </div>
</template>

<script setup>
import Footer from '@/Components/Public/Footer.vue'
</script>
