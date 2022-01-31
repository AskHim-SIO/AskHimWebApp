<template>
  <ul class="flex items-center justify-center space-x-6">
    <!-- Add Story -->
    <li v-for="categorie in categories" :key="categorie.id" class="flex flex-col items-center space-y-2">
      <!-- Ring -->
      <div class="story-ring flex justify-center items-center
                                bg-white rounded-full relative cursor-pointer
                                hover:transition-all duration-150 delay-100">
        <a class="block rounded-full hover:bg-askHim-blue hover:-rotate-6 p-1 " href="#">
          <!-- Thumbnail -->
          <img class="w-25 rounded-full"
               :src="categorie.defaultPhoto">
        </a>
      </div>

      <!-- Username -->
      <span class="story-text font-medium">{{ categorie.libelle }}</span>
    </li>
  </ul>
</template>

<script>
import axios from "axios";

export default {
  name: "typeService",
  props: ['propsdata'],
  data: function () {
    return {
      categories: [],
    }
  },
  mounted () {
    axios
        .get('http://api.askhim.ctrempe.fr/type/get-types')
        .then(response => (this.categories = response.data))
  }
}
</script>

<style scoped>

</style>
