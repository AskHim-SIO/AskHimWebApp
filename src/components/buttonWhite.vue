<template>
  <div class="pt-2">
    <button type="submit"
            class="text-black bg-white hover:bg-[#878787] focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
      {{ name }}
    </button>
  </div>
</template>

<script>
export default {
  name: "buttonWhite",
  props: ['name'],
}
</script>

<style scoped>

</style>
