<script setup lang="ts">
import Modal from "@/components/Modal/Modal.vue";
import {PropType, Ref, ref, UnwrapRef, watch} from "vue";
import axios from "axios";
import Swal from 'sweetalert2'
import FormSupplier from "@/Pages/Home/components/FormSupplier.vue";

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

const emit = defineEmits(['update:modalOpen', 'submitSucess']);

const form: Ref<UnwrapRef<ISupplier>> = ref({} as ISupplier)

watch(() => props.supplier, (value) => {
  if (Object.keys(value).length)
    form.value = value;
}, {deep: true})

function updateSupplier() {
  axios.put(`/api/suppliers/${form.value.id}`, form.value)
      .then(() => {
        emit('update:modalOpen', false);
        Swal.fire('Sucesso', 'Fornecedor atualizado com sucesso!', 'success');
        emit('submitSucess');
      })
      .catch((error) => {
        Swal.fire('Ocorreu um erro', error.response.data.message, 'error');
      });
}

</script>

<template>
  <Modal :modal-open="modalOpen" @update:modalOpen="emit('update:modalOpen', $event)" title="Atualizar Fornecedor">
    <template #body>
      <form id="form" class="flex flex-col gap-4" @submit.prevent="updateSupplier">
        <FormSupplier :form="form"/>
      </form>
    </template>
    <template #footer>
      <button type="submit"
              form="form"
              class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Atualizar
      </button>
    </template>
  </Modal>
</template>
