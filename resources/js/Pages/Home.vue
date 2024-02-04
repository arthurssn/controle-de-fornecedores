<template>
  <Navigation :pagination-data="suppliers" @select-item="getSuppliers($event.url)"/>
</template>

<script setup lang="ts">

import {onMounted, ref} from "vue";
import Navigation from "../components/Pagination/Index.vue";
import axios from "axios";

onMounted(() => getSuppliers())

const suppliers = ref([]);

async function getSuppliers(url: string = '') {
  const {data} = await axios.get(url.length ? url : '/api/suppliers');
  suppliers.value = data;
}

</script>
