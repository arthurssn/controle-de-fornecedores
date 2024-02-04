<script setup lang="ts">
import Modal from "@/components/Modal/Modal.vue";
import Input from "@/components/Forms/Input.vue";
import {PropType, Ref, ref, UnwrapRef, watch} from "vue";
import axios from "axios";
import Swal from 'sweetalert2'

const props = defineProps({
  modalOpen: {
    type: Boolean,
    default: false
  },
  supplier: {
    type: Object as PropType<ISupplier>,
    default: null
  }
})

const emit = defineEmits(['update:modalOpen']);

const form: Ref<UnwrapRef<ISupplier>> = ref({
  name: '',
  cpf_cnpj: '',
  email: '',
  phone: '',
  state: '',
  city: '',
  address: '',
  number: '',
  country: 'Brasil',
})

watch(() => props.supplier, (value) => {
  if (Object.keys(value).length)
    form.value = value;
}, {deep: true})

function createSupplier() {
  axios.post('/api/suppliers', form)
      .then(() => {
        emit('update:modalOpen', false);
        Swal.fire('Sucesso', 'Fornecedor cadastrado com sucesso!', 'success');
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
        Cadastrar
      </button>
    </template>
  </Modal>
</template>
