<template>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table
            class="w-full text-sm text-left rtl:text-right text-blue-500 dark:text-blue-400"
        >
            <thead
                class="text-xs text-blue-700 uppercase bg-blue-50 dark:bg-blue-700 dark:text-blue-400"
            >
                <slot name="head" />
            </thead>
            <tbody>
                <slot name="body" />
            </tbody>
        </table>
    </div>
</template>
