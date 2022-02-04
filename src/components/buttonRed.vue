<template>
  <div class="pt-2">
    <button type="submit"
            class="text-white bg-[#ff0000] hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
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
