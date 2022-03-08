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
              placeholder="Recherche"
              type="text" @input="debounceSearch">
        </div>
        <div class="relative mt-6 max-w-lg mx-auto">
          <div class="flex flex-row mb-1 sm:mb-0">
            <div class="relative">
              <select
                  class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                  @change="countChange($event)">
                <option value="5">5</option>
                <option value="10">10</option>
                <option selected value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="200">200</option>
              </select>
              <div
                  class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

              </div>
            </div>
            <div class="relative">
              <select
                  v-model="select"
                  class=" h-full border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500"
                  @change="selectChange($event)">
                <option value="Tout">Tout</option>
                <option v-for="typeService in typeServices" v-bind:key="typeService.id" :value="typeService.libelle">
                  {{ typeService.libelle }}
                </option>

              </select>
              <div
                  class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">

              </div>
            </div>
          </div>
        </div>

      </div>
    </header>
    <main class="my-8">
      <div class="container mx-auto p-6">
        <div class="flex flex-wrap justify-center">

          <div v-for="service in services" v-bind:key="service.id"
               class="p-4 rounded-xl hover:scale-105 duration-500 transform transition cursor-pointer">
            <!-- Tag Discount -->
            <div v-if="service.type.libelle === 'Transport'">
              <div
                  class="top-0 left-0 mt-3 px-2 rounded-lg absolute z-30 bg-green-500 text-gray-100 text-xs md:text-sm font-medium md:block">
                {{ service.type.libelle }}
              </div>
              <div class="top-0 left-0 h-2 md:h-3 mt-5 px-2 absolute z-20 bg-green-500"></div>
              <div class="top-0 left-0 h-2 md:h-3 mt-6 pl-5 rounded-3xl absolute z-0 bg-green-600"></div>
            </div>

            <div v-if="service.type.libelle === 'Course'">
              <div
                  class="top-0 left-0 mt-3 px-2 rounded-lg absolute z-30 bg-blue-500 text-gray-100 text-xs md:text-sm font-medium md:block">
                {{ service.type.libelle }}
              </div>
              <div class="top-0 left-0 h-2 md:h-3 mt-5 px-2 absolute z-20 bg-blue-500"></div>
              <div class="top-0 left-0 h-2 md:h-3 mt-6 pl-5 rounded-3xl absolute z-0 bg-blue-600"></div>
            </div>

            <div v-if="service.type.libelle === 'Formation'">
              <div
                  class="top-0 left-0 mt-3 px-2 rounded-lg absolute z-30 bg-red-500 text-gray-100 text-xs md:text-sm font-medium md:block">
                {{ service.type.libelle }}
              </div>
              <div class="top-0 left-0 h-2 md:h-3 mt-5 px-2 absolute z-20 bg-red-500"></div>
              <div class="top-0 left-0 h-2 md:h-3 mt-6 pl-5 rounded-3xl absolute z-0 bg-red-600"></div>
            </div>

            <div v-if="service.type.libelle === 'Loisir'">
              <div
                  class="top-0 left-0 mt-3 px-2 rounded-lg absolute z-30 bg-yellow-500 text-gray-100 text-xs md:text-sm font-medium md:block">
                {{ service.type.libelle }}
              </div>
              <div class="top-0 left-0 h-2 md:h-3 mt-5 px-2 absolute z-20 bg-yellow-500"></div>
              <div class="top-0 left-0 h-2 md:h-3 mt-6 pl-5 rounded-3xl absolute z-0 bg-yellow-600"></div>
            </div>

            <div v-if="service.type.libelle === 'Tâche ménagère'">
              <div
                  class="top-0 left-0 mt-3 px-2 rounded-lg absolute z-30 bg-orange-500 text-gray-100 text-xs md:text-sm font-medium md:block">
                {{ service.type.libelle }}
              </div>
              <div class="top-0 left-0 h-2 md:h-3 mt-5 px-2 absolute z-20 bg-orange-500"></div>
              <div class="top-0 left-0 h-2 md:h-3 mt-6 pl-5 rounded-3xl absolute z-0 bg-orange-600"></div>
            </div>
            <div class="w-52 pb-2 bg-white rounded-xl shadow-xl z-10">
              <div class="relative">
                <!-- :src="image.largeImageURL"     -->
                <img :src="service.type.defaultPhoto"
                     alt="" class="max-h-60 object-cover rounded-t-xl">
                <!-- Tag rekomendasi -->
                <!--                                                            <div class="bottom-0 right-0 mb-2 mr-2 px-2 rounded-lg absolute bg-yellow-500 text-gray-100 text-xs font-medium">Pour vous</div>-->
              </div>
              <div class="px-2 py-1">
                <!-- Product Title -->
                <div class="text-sm md:text-base font-bold pr-2">{{ service.name }}</div>
                <div class="flex py-2">
                  <!-- Distance -->
                  <div class="bg-gray-200 p-1 mr-2 rounded-lg text-xs font-medium text-gray-900">
                    ville
                  </div>
                  <div class="flex justify-between item-center">
                    <div class="flex items-center">
                      <svg fill="none" height="16" stroke="#9b9b9b" stroke-linecap="round" stroke-linejoin="round"
                           stroke-width="2" viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                        <line x1="12" x2="12" y1="1" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                      </svg>
                      <!-- Rating total -->
                      <p class="text-gray-600 font-bold text-xs md:text-sm ml-1">
                        {{ service.price }}
                        <!-- Jumlah review -->
                        <span class="text-gray-500 font-normal">AskCoins</span>
                      </p>
                    </div>
                  </div>
                </div>
                <!--                                                            &lt;!&ndash; Alamat &ndash;&gt;-->
                <!--                                                            <p class="pb-1 md:pb-2 text-xs md:text-sm text-gray-500">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>-->
                <!-- Tombol pesan -->
                <div class="flex flex-row-reverse">
                  <router-link :to="{ path: '/service/'+ service.id}">
                    <a class="inset-x-0 bottom-0 flex justify-center bg-blue-500 hover:bg-white text-sm md:text-base border hover:border-2 hover:border-blue-500 rounded-xl w-14 md:w-16 p-1 text-gray-100 hover:text-blue-900"
                       href="#"
                       @input="debounceSearch(service.id)">Voir</a>
                  </router-link>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </main>
  </div>
</template>

<script>

import axios from "axios";
import router from "../router";

export default {
  name: "Research",
  props: {
    someValueToPass: String
  },
  data() {
    return {
      services: [],
      typeServices: [],
      recherche: "",
      findServices: [],
      count: null,
      select: "Tout",
    };
  },
  methods: {
    countChange(event) {
      this.count = event.target.value
      this.debounceSearch()
    },
    selectChange(event) {
      event.target.value === '' ? this.select = 'Tout' : this.select = event.target.value
      this.debounceSearch()

    },
    debounceSearch() {
      clearTimeout(this.debounce)
      this.debounce = setTimeout(() => {
        if (!this.count) {
          axios
              .get(`https://api.askhim.ctrempe.fr/service/search-services?query=${this.recherche}&count=100`)
              .then(response => {
                this.services = []
                response.data.forEach(service => {
                  if (this.select !== "Tout") {
                    if (service.type.libelle === this.select) {
                      this.services.push(service)
                    }
                  } else {
                    this.services.push(service)
                  }
                })
              })
        } else {
          axios
              .get(`https://api.askhim.ctrempe.fr/service/search-services?query=${this.recherche}&count=${this.count}`)
              .then(response => {
                this.services = []
                let cpt = 0
                response.data.forEach(service => {
                  if (this.select !== "Tout") {
                    if (service.type.libelle === this.select) {
                      if (cpt < this.count) {
                        this.services.push(service)
                        cpt++
                      }
                    }
                  } else {
                    if (cpt < this.count) {
                      this.services.push(service)
                      cpt++
                    }
                  }
                })

              })
        }
      }, 600)
    },
    selectService(service) {
      router.push({name: 'Service', params: {id: service}})
    }
  },
  computed: {},
  mounted: function () {
    if (this.$route.params.type !== undefined) {
      this.select = this.$route.params.type
    }
    axios
        .get("https://api.askhim.ctrempe.fr/type/get-types")
        .then(response => (this.typeServices = response.data))

    if (this.select === 'Tout') {
      axios
          .get("https://api.askhim.ctrempe.fr/service/get-recent-services")
          .then(response => {
            response.data.forEach(service => {
                this.services.push(service)
            })

          })
    } else {
      axios
          .get("https://api.askhim.ctrempe.fr/service/get-recent-services")
          .then(response => {
            response.data.forEach(service => {
              if (service.type.libelle === this.select) {
                this.services.push(service)
              }
            })
          })
    }
  },
}
</script>

<style scoped>

</style>
