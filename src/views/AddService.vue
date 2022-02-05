<template>
  <div>
    <form>
      <div class="bg-white">
        <div class="container mx-auto px-40">

          <h3 class="text-gray-600 text-2xl font-medium pb-2">Ajouter un service</h3>
          <div class="mb-4 h-full flex flex-col bg-white shadow-xl rounded-md">
            <div class="flex flex-row">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">Type de service</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <select class="form-select appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example" id="select" v-model="selected" >
                  <option selected>Choisir une catégorie</option>
                  <option v-for="unType in types" :key="unType.id" v-bind:value="unType">{{ unType.libelle }}</option>

                </select>
              </div>
            </div>
            <div class="flex flex-row mb-2">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">Votre demande</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <input class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       placeholder="Inserer l'objet de votre demande"/>
              </div>
            </div>
          </div>

          <h3 v-if="selected !== 'Choisir une catégorie'" class="text-gray-600 text-2xl font-medium pb-2">Information supplémentaire pour un/une {{ selected.libelle }}</h3>
          <div class="mb-4 h-full flex flex-col bg-white shadow-xl rounded-md">
            <formAddServiceByType v-bind:type="selected"></formAddServiceByType>
          </div>



          <h3 class="text-gray-600 text-2xl font-medium pb-2">Votre position</h3>
          <div class="mb-4 h-full flex flex-col bg-white shadow-xl rounded-md">
            <div class="flex flex-row">
            </div>
            <div class="flex flex-row mb-2">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">Adresse</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <input type="select" v-model="selectAdress" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       placeholder="Inserer votre adresse" @input="debounceSearch"/>
                <button type="submit" v-for="address in adresses" :key="address.properties.id"  v-on:click="select(address.properties.label)"
                        class="text-white bg-[#2B6CF2] hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 mt-2 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  {{address.properties.label}}
                </button>

              </div>
            </div>
          </div>

          <h3 class="text-gray-600 text-2xl font-medium pb-2">Vos photos</h3>
          <uploadFile></uploadFile>
        </div>
      </div>
    </form>
  </div>

</template>

<script>
import uploadFile from "../components/uploadFile";
import formAddServiceByType from "../components/formAddServiceByType";
import axios from "axios";

export default {
  name: "AddService",
  components: {uploadFile, formAddServiceByType},
  data: function (){
    return{
      types : [],
      selectAdress:'',
      adresses:[],
      selected : 'Choisir une catégorie',
      debounce: null
    }
  },
  methods: {
    debounceSearch(event) {

      clearTimeout(this.debounce)

      this.debounce = setTimeout(() => {

        axios
            .get('https://api-adresse.data.gouv.fr/search/?q='+event.target.value+'&type=housenumber&autocomplete=1')
            .then(response => (this.adresses = response.data.features))
      }, 600)
    },
    select(value){
      this.selectAdress = value
      this.adresses = []
    }
  },
  mounted () {
    axios
        .get('http://api.askhim.ctrempe.fr/type/get-types')
        .then(response => (this.types = response.data))
  }
}
</script>

<style scoped>

</style>
