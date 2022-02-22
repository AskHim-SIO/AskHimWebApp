<template>
  <div class="bg-white">
    <header>
      <div class="container mx-auto px-6 py-3">
        <div class="relative mt-6 max-w-lg mx-auto">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <svg class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"/>
                            </svg>
                        </span>
          <input
              v-model="recherche"
              class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-askHim-blue focus:outline-none focus:shadow-outline"
              placeholder="Recherche" type="text" @input="debounceSearch">
        </div>
        <div v-if="findServices != []"
             class="absolute z-50 inset-x-0 center-0 max-w-lg mx-auto  text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
          <ul class="py-1">
            <li v-for="findService in findServices" :key="findService.id" class="cursor-pointer"
                v-on:click="selectService(findService.id)">
              <p
                  class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                <span class="font-bold">{{ findService.type.libelle }}</span> - {{ findService.name }}</p>
            </li>
          </ul>
        </div>
      </div>
    </header>
    <main class="my-8">
      <div class="container mx-auto px-6">
        <div class="h-64 rounded-lg overflow-hidden bg-cover bg-center"
             style="background-image: url('https://images.unsplash.com/photo-1579208575657-c595a05383b7?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80')">
          <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
            <div class="px-10 max-w-xl">
              <h2 class="text-2xl text-white font-semibold">Besoin d'aide ? AskHim !</h2>
              <p class="mt-2 text-gray-400">Si tu as besoins d'un dépannage, poste ton service, quelqu'un viendra à ton
                secours !</p>
            </div>
          </div>
        </div>
        <div class="md:flex mt-8 md:-mx-4">
          <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2"
               style="background-image: url('https://images.unsplash.com/photo-1459257831348-f0cdd359235f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80')">
            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
              <div class="px-10 max-w-xl">
                <h2 class="text-2xl text-white font-semibold">Aidez, gagnez</h2>
                <p class="mt-2 text-gray-400">Rendez des services sur AskHim et gagnez votre argent de poche !</p>
              </div>
            </div>
          </div>
          <div
              class="w-full  h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2"
              style="background-image: url('https://images.unsplash.com/photo-1533022139390-e31c488d69e2?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2064&q=80')">
            <div class="bg-gray-900 bg-opacity-75 flex items-center h-full">
              <div class="px-10 max-w-xl">
                <h2 class="text-2xl text-white font-semibold">Ask<span
                    class="text-askHim-blue">Him</span> sur ton mobile !</h2>
                <p class="mt-2 text-gray-400">Toujours avec vous même dans vos poches. <span
                    class="text-askHim-blue">L'application</span> vous permet de contnuer
                  l'aventure
                  peu importe ou vous vous situez.</p>
                <button
                    class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                  <a href="http://cdn.askhim.ctrempe.fr/AskHim.apk"><span>Télécharger l'application !</span></a>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- -- Affichage des catégories -- -->
        <div class="mt-16">
          <h3 class="text-gray-600 text-2xl font-medium">Catégories</h3>
          <type-service></type-service>
        </div>
        <!-- -- Affichage des services recents -- -->
        <div>
          <service-container api="http://api.askhim.ctrempe.fr:80/service/get-recent-services"
                             title="Service récents"></service-container>
        </div>

        <div v-for="categorie in categories" v-bind:key="categorie.id">
          <service-container v-bind:api="'http://api.askhim.ctrempe.fr:80/service/get-services-from-type/'+categorie.id"
                             v-bind:title="categorie.libelle"></service-container>
        </div>

      </div>
    </main>
  </div>

</template>

<script>
import typeService from "../components/typeService";
import serviceContainer from "../components/serviceContainer";
import axios from "axios";
import router from "../router";

export default {
  name: 'Home',

  data: function () {
    return {
      categories: [],
      recherche: "",
      findServices: []
    }
  },
  components: {
    typeService,
    serviceContainer
  },
  mounted() {
    axios
        .get('http://api.askhim.ctrempe.fr/type/get-types')
        .then(response => (this.categories = response.data))
  },
  methods: {
    debounceSearch() {
      clearTimeout(this.debounce)
      this.debounce = setTimeout(() => {
        if (this.recherche !== "") {
          let cpt = 0
          axios
              .get(`http://api.askhim.ctrempe.fr:80/service/search-services?query=${this.recherche}&count=10`)
              .then(response => {
                response.data.forEach(reponse => {
                  if(cpt <= 5){
                    this.findServices.push(reponse)
                    cpt++
                  }
                })
              })
        }
        else{
          this.findServices = []
        }
      }, 600)
    },
    selectService(service) {
      router.push({name: 'Service', params: {id: service}})
    }
  },

}
</script>
