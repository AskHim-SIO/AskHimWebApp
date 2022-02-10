<template>
  <div>
    <div class="flex">
      <div class="flax-initial grow">
        <h3 class="text-gray-600 text-2xl font-medium">{{ titre }}</h3>
      </div>

      <div class="flex">
        <button class="rounded-full hover:border hover:border-askHim-blue hover:border-2" v-on:click="scroll('droite')">
          <svg class="h-8 w-8 text-askHim-blue" width="35" height="35" viewBox="0 0 24 24"
               stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
               stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z"/>
            <polyline points="11 7 6 12 11 17"/>
            <polyline points="17 7 12 12 17 17"/>
          </svg>
        </button>
      </div>
      <div class="flax pl-5">
        <button class="rounded-full hover:border hover:border-askHim-blue hover:border-2" v-on:click="scroll('gauche')"
                id="slideLeft">
          <svg class="h-8 w-8 text-askHim-blue" viewBox="0 0 24 24" fill="none" stroke="currentColor"
               stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="13 17 18 12 13 7"/>
            <polyline points="6 17 11 12 6 7"/>
          </svg>
        </button>
      </div>
    </div>
    <div class="async">
      <div class="flex flex-col mt-5">
        <div class="flex overflow-x-hidden overflow-y-hidden snap-x snap-mandatory" ref="container">
          <div v-for="service in services" :key="service.id"
               class="p-4 rounded-xl hover:scale-105 duration-500 transform transition cursor-pointer">
            <!-- Tag Discount -->
            <div
                class="top-0 left-0 mt-3 px-2 rounded-lg absolute z-30 bg-green-500 text-gray-100 text-xs md:text-sm font-medium md:block">
              {{ service.type.libelle }}
            </div>
            <div class="top-0 left-0 h-2 md:h-3 mt-5 px-2 absolute z-20 bg-green-500"></div>
            <div class="top-0 left-0 h-2 md:h-3 mt-6 pl-5 rounded-3xl absolute z-0 bg-green-600"></div>
            <div class="w-52 pb-2 bg-white rounded-xl shadow-xl z-10">
              <div class="relative">
                <!-- :src="image.largeImageURL"     -->
                <img :src="service.type.defaultPhoto"
                     class="max-h-60 object-cover rounded-t-xl" alt="">
                <!-- Tag rekomendasi -->
                <!--                                                            <div class="bottom-0 right-0 mb-2 mr-2 px-2 rounded-lg absolute bg-yellow-500 text-gray-100 text-xs font-medium">Pour vous</div>-->
              </div>
              <div class="px-2 py-1">
                <!-- Product Title -->
                <div class="text-sm md:text-base font-bold pr-2">{{ service.name }}</div>
                <div class="flex py-2">
                  <!-- Distance -->
                  <div class="bg-gray-200 p-1 mr-2 rounded-lg text-xs font-medium text-gray-900">
                    {{ service.lieu.ville }}
                  </div>
                  <div class="flex justify-between item-center">
                    <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                           stroke="#9b9b9b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
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
                      href="#">Voir</a>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";

export default {
  name: "container",
  props: ['title', 'api'],
  data: function () {
    return {
      route: this.api,
      titre: this.title,
      services: [],
      long: 0,
    }
  },
  mounted() {
    axios
        .get(this.route)
        .then(response => (this.services = response.data))
  },
  methods: {
    scroll: function (direction) {

      if (direction === "gauche") {
        if (this.long <= this.$refs.container.scrollWidth - this.$refs.container.clientWidth)
          this.long = this.long + 600;
        this.$refs.container.scrollTo({
          left: this.long,
          behavior: 'smooth'
        })
      } else {
        if (this.long >= 600) {
          this.long = this.long - 600;

          this.$refs.container.scrollTo({
            left: this.long,
            behavior: 'smooth'
          })
        }
      }
    }
  },
}


</script>

<style scoped>

</style>
