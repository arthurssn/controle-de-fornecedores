<script setup lang="ts">
import Modal from "@/components/Modal/Modal.vue";
import Input from "@/components/Forms/Input.vue";
import {reactive} from "vue";
import axios from "axios";

defineProps({
  modalOpen: {
    type: Boolean,
    default: false
  },
})

const emit = defineEmits(['update:modalOpen']);

const form: ISupplier = reactive({} as ISupplier)

function createSupplier() {
  axios.post('/api/suppliers', form)
      .then(() => {
        emit('update:modalOpen', false);
      })
      .catch((error) => {
        console.error(error);
      });
}

</script>

<template>
  <Modal :modal-open="modalOpen" @update:modalOpen="emit('update:modalOpen', $event)" title="Cadastrar Fornecedor">
    <template #body>
      <form id="form" class="flex flex-col gap-4" @submit.prevent="createSupplier">
        <Input class=w-full :required="true" id="name" placeholder="Digite o nome" label="Nome"
               v-model="form.name"/>
        <Input :required="true" id="cnpj" placeholder="Digite o CPF/CNPJ" label="CNPJ" v-model="form.cpf_cnpj"/>
        <div class="flex flex-row gap-2">
          <Input class="w-1/2" id="email" placeholder="Digite o e-mail" label="Email"
                 v-model="form.email"/>
          <Input class="w-1/2" id="phone" placeholder="Digite o celular" label="Celular"
                 v-model="form.phone"/>
        </div>
        <hr class="h-px my-2 bg-blue-100 border-0 dark:bg-blue-300">
        <div class="flex flex-row gap-2">
          <Input class="w-1/2" id="state" placeholder="Digite o Estado" label="Estado"
                 v-model="form.state"/>
          <Input class="w-1/2" id="city" placeholder="Digite a cidade" label="Cidade"
                 v-model="form.city"/>
        </div>
        <div class="flex flex-row gap-2">
          <Input class="w-full" id="address" placeholder="Digite o endereço" label="Endereço"
                 v-model="form.address"/>
          <Input id="number" placeholder="Digite o número" label="Número"
                 v-model="form.number"/>
        </div>
      </form>
    </template>
    <template #footer>
      <button type="submit"
              form="form"
              class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                clip-rule="evenodd"></path>
        </svg>
        Cadastrar
      </button>
    </template>
  </Modal>
</template>
