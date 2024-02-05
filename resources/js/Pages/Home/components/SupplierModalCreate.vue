<script setup lang="ts">
import Modal from "@/components/Modal/Modal.vue";
import {reactive} from "vue";
import axios from "axios";
import Swal from 'sweetalert2'
import FormSupplier from "@/Pages/Home/components/FormSupplier.vue";

defineProps({
  modalOpen: {
    type: Boolean,
    default: false
  }
})

const emit = defineEmits(['update:modalOpen', 'submitSucess']);

const form: ISupplier = reactive({
  name: '',
  cpf_cnpj: '',
  email: '',
  phone: '',
  state: '',
  city: '',
  address: '',
  number: '',
  country: 'Brasil'
})

function createSupplier() {
  axios.post('/api/suppliers', form)
      .then(() => {
        emit('update:modalOpen', false);
        Swal.fire('Sucesso', 'Fornecedor cadastrado com sucesso!', 'success');
        emit('submitSucess');
      })
      .catch((error) => {
        Swal.fire('Ocorreu um erro', error.response.data.message, 'error');
      });
}

</script>

<template>
  <Modal :modal-open="modalOpen" @update:modalOpen="emit('update:modalOpen', $event)" title="Cadastrar Fornecedor">
    <template #body>
      <form id="form" class="flex flex-col gap-4" @submit.prevent="createSupplier">
        <FormSupplier :form="form"/>
      </form>
    </template>
    <template #footer>
      <button type="submit"
              form="form"
              class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Cadastrar
      </button>
    </template>
  </Modal>
</template>
