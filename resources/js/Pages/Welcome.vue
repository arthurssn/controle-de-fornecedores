<template>
  <Navigation :pagination-data="suppliers"/>
</template>

<script setup lang="ts">

import {onMounted, ref} from "vue";
import Navigation from "../components/Pagination/Index.vue";
import axios from "axios";

onMounted(() => getSuppliers())

const suppliers = ref([]);

async function getSuppliers() {
  const {data} = await axios.get('/api/suppliers');
  suppliers.value = data;
}

</script>
