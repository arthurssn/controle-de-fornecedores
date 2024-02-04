<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-green-500 dark:text-green-400">
      <thead class="text-xs text-green-700 uppercase bg-green-50 dark:bg-green-700 dark:text-green-400">
      <slot name="head"/>
      </thead>
      <tbody>
      <slot name="body"/>
      </tbody>
    </table>
  </div>

</template>

