<template>
  <div>
    <div class="flex">
      <div class="flax-initial grow">
        <h3 class="text-gray-600 text-2xl font-medium">{{ titre }}</h3>
      </div>

      <div class="flex">
        <button class="rounded-full" v-on:click="scroll('droite')">
          <svg aria-hidden="true" class="iconify iconify--mdi-light" height="32"
               preserveAspectRatio="xMidYMid meet" role="img" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg"
               xmlns:xlink="http://www.w3.org/1999/xlink">
            <path
                d="M17 13H8.75L12 16.25l-.664.75l-4.5-4.5l4.5-4.5l.664.75L8.75 12H17v1zm-15-.5a9.5 9.5 0 1 1 19 0a9.5 9.5 0 0 1-19 0zm1 0a8.5 8.5 0 1 0 17 0a8.5 8.5 0 0 0-17 0z"
                fill="#2b6cf2"></path>
          </svg>
        </button>
      </div>
      <div class="flex ml-5">
        <button id="slideLeft" class="rounded-full "
                v-on:click="scroll('gauche')">
          <svg aria-hidden="true" class="iconify iconify--mdi-light" height="32"
               preserveAspectRatio="xMidYMid meet" role="img" viewBox="0 0 24 24" width="32" xmlns="http://www.w3.org/2000/svg"
               xmlns:xlink="http://www.w3.org/1999/xlink">
            <path
                d="M6.003 12h8.25l-3.25-3.25l.664-.75l4.5 4.5l-4.5 4.5l-.664-.75l3.25-3.25h-8.25v-1zm15 .5a9.5 9.5 0 1 1-19 0a9.5 9.5 0 0 1 19 0zm-1 0a8.5 8.5 0 1 0-17 0a8.5 8.5 0 0 0 17 0z"
                fill="#2b6cf2"></path>
          </svg>
        </button>
      </div>
    </div>
    <div class="async">
      <div class="flex flex-col mt-5">
        <div ref="container" class="flex overflow-x-hidden overflow-y-hidden snap-x snap-mandatory">
          <div v-for="service in services" :key="service.id"
               class="p-4 min-width-2 rounded-xl  hover:scale-105 duration-500 transform transition cursor-pointer">
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
                <img v-if="service.photos.length === 0" :src="service.type.defaultPhoto"
                     alt="" class="max-h-60 object-cover rounded-t-xl">
                <img v-else :src="service.photos[0].libelle"
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
                    {{ service.lieu.ville }}
                  </div>
                  <div class="flex justify-between item-center">
                    <div class="flex items-center">
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
        .then(response => {
          response.data.forEach( (service) => {
            if(this.services.length <= 15){
              this.services.push(service)
            }
          })
        })
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
