<script setup lang="ts">
import {Ref, ref} from "vue";

defineProps({
  label: {
    type: String,
    required: true
  },
  placeholder: {
    type: String,
    default: 'Pesquisar'
  }
})

const emit = defineEmits(['submit'])

const search: Ref<string> = ref('');
</script>

<template>
  <form @submit.prevent="emit('submit', search)">
    <label class="block mb-1 text-sm font-semibold text-blue-950 dark:text-blue-950"
           for="default-search">{{ label }}</label>
    <label for="default-search"
           class="mb-2 text-sm font-medium text-white-900 sr-only dark:text-white">{{ placeholder }}</label>
    <div class="relative">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
        <svg class="w-4 h-4 text-white-500 dark:text-white-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
             fill="none" viewBox="0 0 20 20">
          <path stroke="gray" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
        </svg>
      </div>
      <input type="search" id="default-search"
             v-model="search"
             class="block w-full p-2.5 ps-10 text-sm text-blue-950 border border-white-300 rounded-lg bg-white-50 focus:ring-white-500 focus:border-white-500 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-blue-950 dark:focus:ring-white-500 dark:focus:border-white-500"
             :placeholder="placeholder" required
      >
      <button type="submit"
              class="text-white absolute end-2.5 bottom-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-1 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        {{ placeholder }}
      </button>
    </div>
  </form>
</template>
