<script setup lang="ts">

defineProps({
  modalOpen: {
    type: Boolean,
    default: false
  },
  title: {
    type: String,
    required: true
  }
})

const emit = defineEmits(['update:modalOpen'])

</script>

<template>
  <teleport to="body">
    <transition name="slide-fade" appear>
      <div id="crud-modal" tabindex="-1" aria-hidden="true"
           class="modal overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full"
           v-if="modalOpen"
      >
        <div class="relative p-4 max-w-screen-md max-h-full modal-dialog">
          <div class="relative bg-white rounded-lg shadow dark:bg-blue-50">
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-lg font-semibold text-blue-950 dark:text-blue-950">
                {{ title }}
              </h3>
              <button type="button"
                      class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                      data-modal-toggle="crud-modal"
                      @click="emit('update:modalOpen', false)"
              >
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 14 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
              </button>
            </div>
            <div class="p-4 md:p-5">
              <slot name="body"/>
              <div class="flex flex-col md:flex-row gap-3 justify-center items-center">
                <slot name="footer"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition>
    <Transition name="fade">
      <div class="modal-mask" v-if="modalOpen"></div>
    </Transition>
  </teleport>
</template>


<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.4s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.slide-fade-enter-active {
  transition: all 0.2s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.2s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateY(-5rem);
  opacity: 0;
}

.modal-mask {
  position: fixed;
  z-index: 1050;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.1);
  overflow-y: auto;
}


.modal {
  position: fixed;
  z-index: 1060;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.modal-dialog {
  margin: 0;
  z-index: 1060;
  width: 100%;
  max-height: 80vh;
}
</style>
