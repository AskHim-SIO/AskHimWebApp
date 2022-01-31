<template>
  <div class="pt-2">
    <button type="submit"
            class="text-white bg-[#2B6CF2] hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      {{ name }}
    </button>
  </div>
</template>

<script>
export default {
  name: "buttonBlue",
  props: ['name'],
}
</script>

<style scoped>

</style>
