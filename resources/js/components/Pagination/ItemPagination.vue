<template>
    <button
        class="flex items-center justify-center px-3 h-8"
        :class="
            $attrs.class +
            (props.selected
                ? 'leading-tight text-blue-500 bg-white border border-blue-300 hover:bg-blue-100 hover:text-blue-700 dark:bg-blue-800 dark:border-blue-700 dark:text-blue-400 dark:hover:bg-blue-700 dark:hover:text-white'
                : 'text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-blue-700 dark:bg-blue-700 dark:text-white')
        "
        @click="emit('click')"
        v-html="props.label"
    ></button>
</template>

<script setup lang="ts">
const props = defineProps({
    selected: {
        type: Boolean,
        default: false,
    },
    label: {
        type: [String, Number],
        required: true,
    },
});

const emit = defineEmits(["click"]);
</script>
