<template>
  <nav aria-label="Page navigation example">
    <ul class="inline-flex -space-x-px text-base h-10">
      <li v-for="(item, index) in items" :key="item.label">
        <ItemPagination
            :label="item.label"
            :selected="item.selected"
            :class="index == 0 ? 'rounded-s-lg ' : index == (items.length - 1)? 'rounded-e-lg' : '' "
            @click="onSelect(index)"

        />
      </li>
    </ul>
  </nav>
</template>

<script setup lang="ts">
import ItemPagination from "./ItemPagination.vue";
import {ref} from "vue";

const items = ref([
  {label: 'Previous', selected: false},
  {label: '1', selected: true},
  {label: '2', selected: false},
  {label: '3', selected: false},
  {label: 'Next', selected: false},
])

function onSelect(index: number) {
  items.value = items.value.map((item, indexItem) => {
    if (index == indexItem) {
      return {
        ...item, selected: true
      }
    }

    return {
      ...item, selected: false
    }
  })
}
</script>
