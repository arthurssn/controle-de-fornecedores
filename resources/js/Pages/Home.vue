<template>
  <div class="w-1/2 flex flex-col gap-3 justify-center content-center">
    <Table>
      <template #head>
        <tr>
          <th scope="col" class="px-6 py-3">
            <div class="flex items-center">
              NOME FANTASIA
              <button @click="getSuppliers('', {'orderBy': 'name', 'orderType': 'asc'})">
                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 24 24">
                  <path
                      d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg>
              </button>
            </div>
          </th>
          <th scope="col" class="px-6 py-3">
            <div class="flex items-center">
              CPF/CNPJ
              <button @click="getSuppliers('', {'orderBy': 'cpf_cnpj', 'orderType': 'asc'})">
                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 24 24">
                  <path
                      d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg>
              </button>
            </div>
          </th>
          <th scope="col" class="px-6 py-3">
            <div class="flex items-center">
              TELEFONE
              <button @click="getSuppliers('', {'orderBy': 'phone', 'orderType': 'asc'})">
                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 24 24">
                  <path
                      d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg>
              </button>
            </div>
          </th>
          <th scope="col" class="px-6 py-3">
            <div class="flex items-center">
              EMAIL
              <button @click="getSuppliers('', {'orderBy': 'email', 'orderType': 'asc'})">
                <svg class="w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                     viewBox="0 0 24 24">
                  <path
                      d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
                </svg>
              </button>
            </div>
          </th>
          <th scope="col" class="px-6 py-3">
            <span class="sr-only">Edit</span>
          </th>
        </tr>
      </template>
      <template #body>
        <tr class="bg-white border-b dark:bg-green-50 dark:border-gray-700" v-for="supplier in suppliers.data">
          <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-black">
            {{ supplier.name }}
          </th>
          <td class="px-6 py-4">
            {{ supplier.cpf_cnpj }}
          </td>
          <td class="px-6 py-4">
            {{ supplier.phone }}
          </td>
          <td class="px-6 py-4">
            {{ supplier.email }}
          </td>
          <td class="px-6 py-4 text-right">
            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
          </td>
        </tr>
      </template>
    </Table>
    <Navigation :pagination-data="suppliers" @select-item="getSuppliers($event.url)"/>
  </div>
</template>

<script setup lang="ts">
interface Supplier {
  "cpf_cnpj": string
  "name": string
  "email": string
  "phone": string
  "address": string
  "city": string
  "state": string
  "country": string
}

interface SupplierResponse {
  current_page: string,
  data: Supplier[],
  links: object[]
}

import {onMounted, Ref, ref, UnwrapRef} from "vue";
import Navigation from "@/components/Pagination/Index.vue";
import Table from '@/components/Table/Index.vue';

import axios from "axios";

onMounted(() => getSuppliers())

const suppliers: Ref<UnwrapRef<SupplierResponse>> = ref({} as SupplierResponse);
const currentUrl: Ref<string> = ref('');
const queryParams: Ref<{}> = ref({});

async function getSuppliers(url: string = '', params = {}) {
  currentUrl.value = url.length ? url : '/api/suppliers';
  queryParams.value = Object.keys(params).length > 0 ? params : queryParams.value;
  const {data}: SupplierResponse = await axios.get(currentUrl.value, {params: queryParams.value});
  suppliers.value = data;
}

</script>
