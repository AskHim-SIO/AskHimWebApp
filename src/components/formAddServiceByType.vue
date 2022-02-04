<template>
  <div>

    <div v-if="type.libelle === 'Transport'">
      <div class="flex flex-row">
        <div class="basis-1/2 m-3 mt-6">
          <p class="text-gray-600 text-2md font-medium pt-3">Type de service</p>
        </div>
        <div class="basis-1/2 m-3 mt-6">
          <select class="form-select appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                  transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  aria-label="Default select example" id="select">
            <option selected>Choisir une catégorie</option>

          </select>
        </div>
      </div>
    </div>

    <div v-if="type.libelle === 'Course'">
      <div class="flex flex-row">
        <div class="basis-1/2 m-3 mt-6">
          <p class="text-gray-600 text-2md font-medium pt-3">Type de course</p>
        </div>
        <div class="basis-1/2 m-3 mt-6">
          <select class="form-select appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                  transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                  aria-label="Default select example" id="select">
            <option selected>Choisir une catégorie</option>

          </select>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "formAddServiceByType",
  props: ['type'],
}
</script>

<style scoped>

</style>
