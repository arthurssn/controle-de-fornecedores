<template>
  <Main>
    <h1 class="text-blue-950 text-2xl font-bold mb-4">Controle de Fornecedores</h1>
    <div class="flex flex-col gap-3 justify-center content-center">
      <div class="flex justify-end ">
        <button type="button"
                class="w-full sm:w-fit text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-bold rounded-lg text-md px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-80 w-1/6">
          Cadastrar Fornecedor
        </button>
      </div>
      <hr class="h-px my-2 bg-blue-100 border-0 dark:bg-blue-300">
      <Filter :query-params="queryParams"
              @change-query="queryParams = $event"/>
      <SuppliersTable :suppliers="suppliers.data" @get-suppliers="getSuppliersOrdered"
                      :order-type="queryParams.orderType"/>
      <Pagination :pagination-data="suppliers" @select-item="getSuppliers($event.url)"/>
    </div>
  </Main>
</template>

<script setup lang="ts">
import SuppliersTable from "@/Pages/Home/components/SuppliersTable.vue";
import {onMounted, Ref, ref, UnwrapRef, watch} from "vue";
import Pagination from "@/components/Pagination/Index.vue";
import Main from "@/layout/Main.vue";

import axios from "axios";
import Filter from "@/Pages/Home/components/Filter.vue";

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

onMounted(() => getSuppliers())

const suppliers: Ref<UnwrapRef<ISupplierResponse>> = ref({} as ISupplierResponse);
const currentUrl: Ref<string> = ref('');
const queryParams: Ref<UnwrapRef<IQueryParams>> = ref({} as IQueryParams);

watch(() => queryParams.value, (value) => {
  getSuppliers(currentUrl.value, value);
}, {deep: true})

async function getSuppliers(url: string = '', params: IQueryParams = {} as IQueryParams) {
  currentUrl.value = url.length ? url : '/api/suppliers';
  queryParams.value = Object.keys(params).length > 0 ? params : queryParams.value;
  let {data}: ISupplierResponse = await axios.get(currentUrl.value, {params: queryParams.value});
  if (queryParams.value.cnpj)
    data.data = [data]
  suppliers.value = data;
}

async function getSuppliersOrdered(params: IQueryParams = {} as IQueryParams) {
  currentUrl.value = '/api/suppliers';
  queryParams.value = {...params, numberOfItemsPerPage: queryParams.value.numberOfItemsPerPage};
  const {data}: ISupplierResponse = await axios.get(currentUrl.value, {params: queryParams.value});
  suppliers.value = data;
}

</script>
