<template>
  <div class="min-h-full min-w-full bg-gray-100 flex">
    <div class="w-1/4 hidden md:block">
      <Sidebar/>
    </div>
    <div class="w-full md:w-3/4 p-8">
      <slot/>
    </div>
  </div>
</template>


<script setup lang="ts">

import Sidebar from "@/layout/Sidebar.vue";
</script>
