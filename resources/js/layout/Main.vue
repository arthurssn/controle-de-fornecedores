<template>
    <div class="h-screen bg-gray-300 flex flex-col">
        <div class="h-20 min-w-full bg-gray-100">
            <Navbar/>
        </div>
        <div class="flex h-full min-w-full">
            <div class="w-1/6 hidden md:block bg-gray-100">
                <Sidebar/>
            </div>
            <div class="w-full md:w-3/4 p-8">
                <slot/>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import Sidebar from "@/layout/Sidebar.vue";
import Navbar from "@/layout/Navbar.vue";
</script>
