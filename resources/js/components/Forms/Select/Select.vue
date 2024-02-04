<template>
  <label
      :for="id"
      class="block mb-1 text-sm font-semibold text-blue-950 dark:text-blue-950"
  >{{ props.label }}</label
  >
  <select
      :id="id"
      class="bg-white-50 border border-white-300 text-white-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-white-700 dark:border-white-600 dark:placeholder-white-400 dark:text-blue-950 dark:focus:ring-white-500 dark:focus:border-blue-950"
      :value="props.modelValue"
      @input="emit('update:modelValue', $event?.target?.value ?? '')"
  >
    <option selected class="text-blue-950" disabled>{{ props.placeholder }}</option>
    <option class="text-blue-950" v-for="option in props.options" :value="option.value" :selected="option.selected">
      {{ option.label }}
    </option>
  </select>
</template>

<script setup lang="ts">
import {PropType} from "vue";

const props = defineProps({
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
    default: "Selecione",
  },
  options: {
    type: Array as PropType<IOptionSelect[]>,
    required: true
  },
  modelValue: {
    type: [Number, String],
    required: true
  }
});

const emit = defineEmits(['update:modelValue'])
</script>
