<template>
  <nav aria-label="Page navigation " class="w-100 flex content-center justify-center">
    <ul class="inline-flex -space-x-px text-base h-10">
      <li v-for="(item, index) in items" :key="item.label">
        <ItemPagination
            :label="item.label"
            :selected="item.active"
            :class="index == 0 ? 'rounded-s-lg ' : index == (items.length - 1)? 'rounded-e-lg' : '' "
            @click="onSelect(index)"
        />
      </li>
    </ul>
  </nav>
</template>

<script setup lang="ts">
interface ItemPagination {
  url: string,
  label: string,
  active: boolean
}

import ItemPagination from "./ItemPagination.vue";
import {Ref, ref, UnwrapRef, watch} from "vue";

const props = defineProps({
  paginationData: {
    type: Object,
    required: true
  }
})

const emit = defineEmits(['selectItem']);

const items: Ref<UnwrapRef<ItemPagination[]>> = ref([] as ItemPagination[]);

watch(() => props.paginationData, (value) => {
  if (value) {
    items.value = value.links
  }
})

function onSelect(index: number) {
  const selectedItemIndex = items.value.findIndex(item => item.active)
  items.value.forEach((item, indexItem) => {

    const clickedOnPreviousButton = index == 0;
    const lastPosition = items.value.length - 1;
    const clickedOnNextButton = index == lastPosition;

    if (clickedOnPreviousButton) {
      if (selectedItemIndex == 1)
        return
      if (selectedItemIndex == indexItem + 1) {
        emit('selectItem', item)
        return item.active = true
      }
      return item.active = false
    }

    if (clickedOnNextButton) {
      if (selectedItemIndex == lastPosition - 1)
        return
      if (selectedItemIndex == indexItem - 1) {
        emit('selectItem', item)
        return item.active = true
      }
      return item.active = false
    }

    if (index == indexItem) {
      emit('selectItem', item)
      return item.active = true
    }

    return item.active = false
  })
}
</script>
