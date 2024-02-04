<template>
  <Table>
    <template #head>
      <tr>
        <th scope="col" class="px-6 py-3">
          <HeaderItem
              label="NOME FANTASIA"
              :order-type="orderType"
              order-by="name"
              @get-suppliers="emit('getSuppliers', $event)"
          />
        </th>
        <th scope="col" class="px-6 py-3">
          <HeaderItem
              label="CPF/CNPJ"
              :order-type="orderType"
              order-by="cpf_cnpj"
              @get-suppliers="emit('getSuppliers', $event)"
          />
        </th>
        <th scope="col" class="px-6 py-3">
          <HeaderItem
              label="TELEFONE"
              :order-type="orderType"
              order-by="phone"
              @get-suppliers="emit('getSuppliers', $event)"
          />
        </th>
        <th scope="col" class="px-6 py-3">
          <HeaderItem
              label="EMAIL"
              :order-type="orderType"
              order-by="email"
              @get-suppliers="emit('getSuppliers', $event)"
          />
        </th>
        <th scope="col" class="px-6 py-3">
          <span class="sr-only">Editar</span>
        </th>
        <th scope="col" class="px-6 py-3">
          <span class="sr-only">Excluir</span>
        </th>
      </tr>
    </template>
    <template #body>
      <tr
          class="bg-white border-b dark:bg-blue-50 dark:border-blue-700"
          v-for="supplier in suppliers"
      >
        <th
            scope="row"
            class="px-6 py-4 font-semibold whitespace-nowrap text-black"
        >
          {{ supplier.name }}
        </th>
        <td class="px-6 py-4 text-blue-950 font-semibold">
          {{ supplier.cpf_cnpj }}
        </td>
        <td class="px-6 py-4  text-blue-950 font-semibold">
          {{ supplier.phone }}
        </td>
        <td class="px-6 py-4  text-blue-950 font-semibold">
          {{ supplier.email }}
        </td>
        <td class="px-6 py-4 text-right">
          <button
              href="#"
              class="font-semibold text-blue-600 dark:text-blue-500 hover:underline p-2 bg-white rounded-md"
          >Editar
          </button
          >
        </td>
        <td class="px-6 py-4 text-right">
          <button
              href="#"
              class="font-semibold text-red-600 dark:text-red-500 hover:underline p-2 bg-white rounded-md"
          >Excluir
          </button
          >
        </td>
      </tr>
    </template>
  </Table>
</template>

<script setup lang="ts">
import Table from "@/components/Table/Index.vue";
import {PropType} from "vue";
import HeaderItem from "@/Pages/Home/components/HeaderItem.vue";

const orderedHelper = {
  Asc: "asc",
  Desc: "desc",
  Any: null,
};

defineProps({
  suppliers: {
    type: Array as PropType<ISupplier[]>,
    required: true,
  },
  orderType: {
    type: String,
    default: "desc",
  },
});

const emit = defineEmits(["getSuppliers"]);
</script>
