<template>
    <div class="min-w-full min-h-full p-2 border-blue-200 border-2">
        <h4 class="font-bold text-blue-700 mt-8">Acesso Rápido</h4>
        <div class="p-4">
            <ul class="bg-blue-200 rounded-xl p-2 flex flex-col gap-4">
                <li>
                    <Link href="/" class="text-blue-500 font-semibold"
                        >Fornecedores</Link
                    >
                </li>
                <li>
                    <Link href="/" class="text-blue-500 font-semibold"
                        >Cadastrar Fornecedor</Link
                    >
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup lang="ts">
import { Link } from "@inertiajs/vue3";
</script>
