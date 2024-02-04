<template>
  <Main>
    <div class="flex flex-col gap-3 justify-center content-center">
      <SuppliersTable :suppliers="suppliers.data" @get-suppliers="getSuppliersOrdered"
                      :order-type="queryParams.orderType"/>
      <Pagination :pagination-data="suppliers" @select-item="getSuppliers($event.url)"/>
    </div>
  </Main>
</template>

<script setup lang="ts">
import SuppliersTable from "@/Pages/Home/components/SuppliersTable.vue";
import {onMounted, Ref, ref, UnwrapRef} from "vue";
import Pagination from "@/components/Pagination/Index.vue";
import Main from "@/layout/Main.vue";

import axios from "axios";

interface ISupplierResponse {
  current_page: string,
  data: ISupplier[],
  links: object[]
}

interface IQueryParams {
  orderBy: string,
  orderType: string
}

onMounted(() => getSuppliers())

const suppliers: Ref<UnwrapRef<ISupplierResponse>> = ref({} as ISupplierResponse);
const currentUrl: Ref<string> = ref('');
const queryParams: Ref<UnwrapRef<IQueryParams>> = ref({} as IQueryParams);

async function getSuppliers(url: string = '', params: IQueryParams = {} as IQueryParams) {
  currentUrl.value = url.length ? url : '/api/suppliers';
  queryParams.value = Object.keys(params).length > 0 ? params : queryParams.value;
  const {data}: ISupplierResponse = await axios.get(currentUrl.value, {params: queryParams.value});
  suppliers.value = data;
}

async function getSuppliersOrdered(params: IQueryParams = {} as IQueryParams) {
  currentUrl.value = '/api/suppliers';
  queryParams.value = Object.keys(params).length > 0 ? params : queryParams.value;
  const {data}: ISupplierResponse = await axios.get(currentUrl.value, {params: queryParams.value});
  suppliers.value = data;
}

</script>
