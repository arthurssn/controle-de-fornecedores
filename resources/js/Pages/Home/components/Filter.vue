<template>
  <div class="flex flex-col md:flex-row gap-3 justify-end align-baseline items-baseline">
    <div class="w-full md:w-1/6">
      <Select :options="optionsItemsPerPage" label="Itens por página" id="itemsPerPage" v-model="selectedItem"/>
    </div>
    <div class="w-full">
      <SearchInput label="Buscar
      CPF/CNPJ (Caso não haja dados na nossa base local, será consultado um endereço exterior) - Deixe vazio para buscar todos os fornecedores"
                   @submit="changeCnpj"
      />
    </div>
  </div>
</template>

<script setup lang="ts">

import Select from "@/components/Forms/Select";
import {PropType, ref, watch} from "vue";
import SearchInput from "@/components/Forms/SearchInput/SearchInput.vue";

interface IQueryParams {
  orderBy: string,
  orderType: string,
  numberOfItemsPerPage: string | number
}

const optionsItemsPerPage: IOptionSelect[] = [
  {label: 1, value: 1, selected: false},
  {label: 3, value: 3, selected: true},
  {label: 5, value: 5, selected: false},
  {label: 10, value: 10, selected: false},
];

const selectedItem = ref(optionsItemsPerPage[1].value);

watch(() => selectedItem.value, (value) => {
  emit('changeQuery', {
    ...props.queryParams,
    numberOfItemsPerPage: value
  })
})

const emit = defineEmits(['changeQuery'])
const props = defineProps({
  queryParams: {
    type: Object as PropType<IQueryParams>,
    required: true
  }
})

function changeCnpj(cnpj = '') {
  console.log(cnpj)
  const args = {
    ...props.queryParams,
  }
  if (cnpj.length) {
    args.cnpj = cnpj
  } else {
    delete args.cnpj
  }
  emit('changeQuery', args)
}
</script>
