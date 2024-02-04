<script setup lang="ts">
defineProps({
  id: {
    type: String,
    required: true
  },
  label: {
    type: String,
    requrired: true
  },
  placeholder: {
    type: String,
    default: "Digite",
  },
  modelValue: {
    type: [Number, String],
    required: true
  },
  required: {
    type: Boolean,
    default: false
  }
})

const emit = defineEmits(['update:modelValue'])
</script>

<template>
  <div class="col-span-2">
    <label :for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ label }}</label>
    <input type="text" :name="id" :id="id"
           :value="modelValue"
           @input="emit('update:modelValue', $event?.target?.value ?? '')"
           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
           :placeholder="placeholder" :required="required">
  </div>
</template>

<style scoped>

</style>
