<template>
    <div>
        <h1 class="text-3xl font-bold underline">
            Hello world!
        </h1>
        <div>
            Count is: {{ count }}
            <button @click="count++">Click here to increment</button>
        </div>
        <div>
            <Navigation/>
        </div>
    </div>
</template>

<script setup lang="ts">

import {ref} from "vue";
import Navigation from "../components/Pagination/Index.vue";

const count = ref(0);
</script>
