<template>
  <div class="flex gap-3 justify-end">
    <div class="w-1/6">
      <Input :options="optionsItemsPerPage" label="Itens por página" id="itemsPerPage" v-model="selectedItem"/>
    </div>
  </div>
</template>

<script setup lang="ts">

import Input from "@/components/Forms/Input";
import {ref, watch} from "vue";


const optionsItemsPerPage: IOptionSelect[] = [
  {label: 1, value: 1, selected: false},
  {label: 3, value: 3, selected: true},
  {label: 5, value: 5, selected: false},
  {label: 10, value: 10, selected: false},
];

const selectedItem = ref(optionsItemsPerPage[1].value);

watch(() => selectedItem.value, (value) => {
  emit('changeItemsPerPage', value)
})

const emit = defineEmits(['changeItemsPerPage'])
</script>
