<template>
  <Main>
    <h1 class="text-blue-950 text-2xl font-bold mb-4">Controle de Fornecedores</h1>
    <div class="flex flex-col gap-3 justify-center content-center">
      <div class="flex justify-end ">
        <button type="button"
                class="w-full sm:w-fit text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-md px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-80"
                @click="modalCreateOpen = true">
          Cadastrar Fornecedor
        </button>
      </div>
      <hr class="h-px my-2 bg-blue-100 border-0 dark:bg-blue-300">
      <Filter
          :query-params="queryParams"
          @change-query="queryParams = $event"
      />
      <SuppliersTable
          :suppliers="suppliers.data"
          :order-type="queryParams.orderType"
          :loading="gettingSuppliers"
          @get-suppliers="getSuppliersOrdered"
          @select-supplier="onSelectSupplier"
          @submit-success="getSuppliers"
      />
      <Pagination
          :pagination-data="suppliers"
          @select-item="getSuppliers($event.url)"
      />
    </div>
  </Main>
  <SupplierModalEdit
      :modal-open="modalEditOpen"
      :supplier="supplierSelected"
      @update:modalOpen="modalEditOpen = $event"
      @submitSucess="getSuppliers"
  />
  <SupplierModalCreate
      :modal-open="modalCreateOpen"
      :supplier="supplierSelected"
      @update:modalOpen="modalCreateOpen = $event"
      @submitSucess="getSuppliers"
  />
</template>

<script setup lang="ts">
import SuppliersTable from "@/Pages/Home/components/SuppliersTable.vue";
import {onMounted, Ref, ref, UnwrapRef, watch} from "vue";
import Pagination from "@/components/Pagination/Index.vue";
import Main from "@/layout/Main.vue";

import axios from "axios";
import Filter from "@/Pages/Home/components/Filter.vue";
import SupplierModalEdit from "@/Pages/Home/components/SupplierModalEdit.vue";
import SupplierModalCreate from "@/Pages/Home/components/SupplierModalCreate.vue";
import Swal from "sweetalert2";
import SupplierService from "@/services/SupplierService";

interface ISupplierResponse {
  current_page?: string,
  data: ISupplier[],
  links?: object[]
}

interface IQueryParams {
  orderBy: string,
  orderType: string,
  numberOfItemsPerPage: string | number,
  cnpj: string
}


const suppliers: Ref<UnwrapRef<ISupplierResponse>> = ref({} as ISupplierResponse);
const currentUrl: Ref<string> = ref('');
const queryParams: Ref<UnwrapRef<IQueryParams>> = ref({} as IQueryParams);
const modalEditOpen = ref(false);
const modalCreateOpen = ref(false);
const supplierSelected: Ref<UnwrapRef<ISupplier>> = ref({} as ISupplier);
const gettingSuppliers = ref(false);

watch(() => queryParams.value, (value) => {
  getSuppliers(currentUrl.value, value);
}, {deep: true})

onMounted(() => getSuppliers())

async function getSuppliers(url: string = '', params: IQueryParams = {} as IQueryParams) {
  suppliers.value = {} as ISupplierResponse;
  currentUrl.value = url.length ? url : '/api/suppliers';
  queryParams.value = Object.keys(params).length > 0 ? params : queryParams.value;
  gettingSuppliers.value = true;
  try {
    let {data}: ISupplierResponse = await SupplierService.getAll(currentUrl.value, queryParams.value);
    if (queryParams.value.cnpj) {
      suppliers.value = {
        data: [data]
      };
      return;
    }
    suppliers.value = data;
  } catch (e) {
    Swal.fire({
      title: 'Erro ao buscar fornecedores',
      text: 'Tente novamente mais tarde: ' + (typeof e.response.data == 'string' ? e.response.data : e.response.data.message),
      icon: 'error'
    })
  } finally {
    gettingSuppliers.value = false;
  }
}

async function getSuppliersOrdered(params: IQueryParams = {} as IQueryParams) {
  suppliers.value = {} as ISupplierResponse;
  currentUrl.value = '/api/suppliers';
  queryParams.value = {...params, numberOfItemsPerPage: queryParams.value.numberOfItemsPerPage};
  const {data}: ISupplierResponse = await SupplierService.getAll(currentUrl.value,  queryParams.value);
  suppliers.value = data;
}

function onSelectSupplier(event) {
  if (event.action === 'edit') {
    modalEditOpen.value = true;
    supplierSelected.value = event.supplier;
  }
}

</script>
