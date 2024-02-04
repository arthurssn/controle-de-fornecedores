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
  const selectedItemIndex = items.value.findIndex(item => item.selected)
  items.value = items.value.map((item, indexItem) => {

    const clickedOnPreviousButton = index == 0;
    const lastPosition = items.value.length - 1;
    const clickedOnNextButton = index == lastPosition;

    if (clickedOnPreviousButton) {
      if (selectedItemIndex == 1) {
        return item
      }
      if (selectedItemIndex == indexItem + 1) {
        return {
          ...item, selected: true
        }
      }
      return {
        ...item, selected: false
      }
    }

    if (clickedOnNextButton) {
      if (selectedItemIndex == lastPosition - 1) {
        return item
      }
      if (selectedItemIndex == indexItem - 1) {
        return {
          ...item, selected: true
        }
      }
      return {
        ...item, selected: false
      }
    }

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
