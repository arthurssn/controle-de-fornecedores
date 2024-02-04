<template>
  <button class="flex items-center justify-center px-3 h-8"
          :class="
          $attrs.class +(
           props.selected?
            'leading-tight text-green-500 bg-white border border-green-300 hover:bg-green-100 hover:text-green-700 dark:bg-green-800 dark:border-green-700 dark:text-green-400 dark:hover:bg-green-700 dark:hover:text-white':
           'text-blue-600 border border-green-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-green-700 dark:bg-green-700 dark:text-white'
        )"
          @click="emit('click')"
          v-html="props.label"
  >
  </button>
</template>

<script setup lang="ts">
const props = defineProps({
  selected: {
    type: Boolean,
    default: false
  },
  label: {
    type: [String, Number],
    required: true
  },
})

const emit = defineEmits(['click']);
</script>
