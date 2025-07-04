<template>
  <div
    class="bg-white rounded-xl p-5 shadow-md hover:shadow-lg transition cursor-pointer border border-[#FFE6B4] hover:border-[#FF9E4F]"
    @click="$emit('click')"
  >
    <h2 class="text-lg font-semibold text-[#B55233] mb-2">{{ title }}</h2>
    <p class="text-sm text-gray-600">{{ description }}</p>
  </div>
</template>

<script setup>
defineProps(['title', 'description'])
defineEmits(['click'])
</script>
