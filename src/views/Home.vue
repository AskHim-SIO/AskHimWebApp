<template>
  <div class="bg-white">
    <header>
      <div class="container mx-auto px-6 py-3">
        <div class="relative mt-6 max-w-lg mx-auto">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </svg>
                        </span>
          <input
              class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-askHim-blue focus:outline-none focus:shadow-outline"
              type="text" placeholder="Recherche">
        </div>
      </div>
    </header>
    <main class="my-8">
      <div class="container mx-auto px-6">
        <div class="h-64 rounded-lg overflow-hidden bg-cover bg-center"
             style="background-image: url('https://images.unsplash.com/photo-1577655197620-704858b270ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&q=144')">
          <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
            <div class="px-10 max-w-xl">
              <h2 class="text-2xl text-white font-semibold">Sport Shoes</h2>
              <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
              <button
                  class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                <span>Shop Now</span>
                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                  <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
              </button>
            </div>
          </div>
        </div>
        <div class="md:flex mt-8 md:-mx-4">
          <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2"
               style="background-image: url('https://images.unsplash.com/photo-1547949003-9792a18a2601?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80')">
            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
              <div class="px-10 max-w-xl">
                <h2 class="text-2xl text-white font-semibold">Back Pack</h2>
                <p class="mt-2 text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing
                  elit.
                  Tempore facere provident molestias ipsam sint voluptatum pariatur.</p>
                <button
                    class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                  <span>Shop Now</span>
                  <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round"
                       stroke-linejoin="round"
                       stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                  </svg>
                </button>
              </div>
            </div>
          </div>
          <div
              class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2"
              style="background-image: url('https://graphiste.com/blog/wp-content/uploads/2019/09/une-graphiste-banniere-web-inspiration-810x403.jpg')">
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
                  <span>Télécharger l'application !</span>
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
          <service-container title="Service récents" api="http://api.askhim.ctrempe.fr:80/service/get-recent-services"></service-container>
        </div>

        <div v-for="categorie in categories" v-bind:key="categorie.id">
          <service-container v-bind:title="categorie.libelle" v-bind:api="'http://api.askhim.ctrempe.fr:80/service/get-services-from-type/'+categorie.id"></service-container>
        </div>

      </div>
    </main>
  </div>
</template>

<script>
import typeService from "../components/typeService";
import serviceContainer from "../components/serviceContainer";
import axios from "axios";

export default {
  name: 'Home',

  data: function () {
    return {
      categories: [],
    }
  },
  components:{
    typeService,
    serviceContainer
  },
  mounted () {
    axios
        .get('http://api.askhim.ctrempe.fr/type/get-types')
        .then(response => (this.categories = response.data))
  }
}
</script>
