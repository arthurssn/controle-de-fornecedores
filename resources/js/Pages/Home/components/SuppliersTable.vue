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
                    {{ supplier.name ?? 'Não informado' }}
                </th>
                <td class="px-6 py-4 text-blue-950 font-semibold">
                    {{ supplier.cpf_cnpj ?? 'Não informado' }}
                </td>
                <td class="px-6 py-4  text-blue-950 font-semibold">
                    {{ supplier.phone ?? 'Não informado' }}
                </td>
                <td class="px-6 py-4  text-blue-950 font-semibold">
                    {{ supplier.email ?? 'Não informado' }}
                </td>
                <td class="px-6 py-4 text-right">
                    <button
                        @click="emit('selectSupplier', {
                action: 'edit',
                supplier: supplier
              })"
                        class="font-semibold text-blue-600 dark:text-blue-500 hover:underline p-2 bg-white rounded-md"
                    > {{ supplier.external ? 'Visualizar' : 'Editar' }}
                    </button
                    >
                </td>
                <td class="px-6 py-4 text-right">
                    <button
                        class="font-semibold text-red-600 dark:text-red-500  p-2 bg-white rounded-md"
                        :class="supplier.external ? '':'hover:underline'"
                        :disabled="supplier.external"
                        @click="removeSupplier(supplier.id ?? 0)"
                    >{{ supplier.external ? 'Esse é um registro externo que não pode ser manipulado' : 'Excluir' }}
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
import axios from "axios";
import Swal from "sweetalert2";

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

const emit = defineEmits(["submitSuccess", 'getSuppliers']);

async function removeSupplier(id: number) {
    Swal.fire({
        title: "Confirma remoção?",
        text: "Essa ação não pode ser revertida",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            axios.delete(`/api/suppliers/${id}`)
                .then(() => {
                    emit('submitSuccess',);
                    Swal.fire({
                        title: 'Sucesso!',
                        text: 'Fornecedor excluído com sucesso!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                })
                .catch((error) => {
                    console.log(error);
                });
        }
    });

}
</script>
