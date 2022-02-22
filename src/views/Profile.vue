<template>
  <div class="bg-white">
    <main class="my-8">
      <div class="container mx-auto p-6">
        <!-- component -->
        <div class="w-full px-4 mx-auto">
          <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
            <div class="px-6">
              <div class="flex flex-wrap justify-center">
                <div class="w-full p-5 px-4 flex justify-center">
                  <div class="w-10 h-10 rounded-full">
                    <img alt="..."
                         class="absolute shadow-xl  rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"
                         v-bind:src="this.user.profilPicture">
                  </div>

                </div>
                <div class="w-full px-4 text-center  mt-20">
                  <h3 class="text-xl font-semibold leading-normal mt-4 text-blueGray-700 mb-2">
                    {{ this.user.firstname }} {{ this.user.name }}
                  </h3>
                </div>
                <div class="w-full px-4 text-center">
                  <div v-if="!paramGuid" class="flex justify-center py-4 lg:pt-4 pt-8">
                    <div class="mr-4 p-3 text-center">
                      <span  class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">{{
                          this.user.credit
                        }}</span>
                      <span class="text-sm text-blueGray-400">AskCoins</span>
                    </div>

                    <div v-if="user.address" class="mr-4 p-3 text-center">
                      <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"> {{
                          user.address
                        }} </span>
                      <span class="text-sm text-blueGray-400">Adresse</span>
                    </div>
                    <div v-else class="mr-4 p-3 text-center">
                      <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">à completer </span>
                      <span class="text-sm text-blueGray-400">Adresse</span>
                    </div>

                    <div v-if="user.tel" class="mr-4 p-3 text-center">
                      <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"> {{ user.tel }} </span>
                      <span class="text-sm text-blueGray-400">Téléphone</span>
                    </div>
                    <div v-else class="mr-4 p-3 text-center">
                      <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"> à completer </span>
                      <span class="text-sm text-blueGray-400">Téléphone</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mt-6">
                <div class="flex flex-wrap justify-center">
                  <div v-for="service in services" v-bind:key="service.id"
                       class="p-4 rounded-xl hover:scale-105 duration-500 transform transition cursor-pointer">
                    <!-- Tag Discount -->
                    <div
                        class="top-0 left-0 mt-3 px-2 rounded-lg absolute z-30 bg-green-500 text-gray-100 text-xs md:text-sm font-medium md:block">
                      <p>{{ service.type.libelle }}</p>
                    </div>
                    <div class="top-0 left-0 h-2 md:h-3 mt-5 px-2 absolute z-20 bg-green-500"></div>
                    <div class="top-0 left-0 h-2 md:h-3 mt-6 pl-5 rounded-3xl absolute z-0 bg-green-600"></div>
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
                              <svg fill="none" height="16" stroke="#9b9b9b" stroke-linecap="round"
                                   stroke-linejoin="round"
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
              <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                <div class="flex flex-wrap justify-center">
                  <div class="w-full lg:w-9/12 px-4">
                    <service-container v-if="!paramGuid"
                        v-bind:api="'http://api.askhim.ctrempe.fr:80/service/get-services-from-user-by-token/'+guid"
                        v-bind:title="'Vos services'"></service-container>
                    <service-container v-else
                                       v-bind:api="'http://api.askhim.ctrempe.fr:80/service/get-services-from-user-by-id/'+paramGuid"
                                       v-bind:title="'Vos services'"></service-container>
                    <div class="flex justify-center">
                      <div class="pt-2">
                        <button
                            class="text-white bg-[#ff0000] hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                            type="submit" v-if="!paramGuid"
                            v-on:click="deconnexion">
                          Se deconnecter
                        </button>
                      </div>
                      <div v-if="!paramGuid">
                        <router-link to="modifier-profil">
                          <buttonBlue data-modal-toggle="update-profile" name="Modifier le profil"
                                      type="class"></buttonBlue>
                        </router-link>
                      </div>
                    </div>
                  </div>
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
import ButtonBlue from "../components/buttonBlue";
import store from "../store";
import router from "../router";
import axios from "axios";
import serviceContainer from "../components/serviceContainer";

export default {

  components: {ButtonBlue, serviceContainer},
  name: "Profile",
  data() {
    return {
      services: [],
      user: []
    }
  },
  methods: {
    deconnexion: function () {
      store.commit('logOut');
      router.push({name: 'Home'})
    }
  },
  computed: {
    firstname() {
      return store.state.profile.firstname;
    },
    guid() {
      return store.state.guid;
    },
    paramGuid() {
      return this.$route.params.id;
    },
    name() {
      return store.state.profile.name;
    },
    profilePicture() {
      return store.state.profile.profilePicture;
    }
  },
  mounted() {
    if(this.paramGuid){
      axios
          .get(`http://api.askhim.ctrempe.fr:80/user/get-user-by-id/${this.paramGuid}`)
          .then(response => {
            this.user = response.data
          })
      .catch(() => {
        router.push("/")
      })

    }
    else{
      axios
          .get(`http://api.askhim.ctrempe.fr:80/user/get-user-by-token/${this.guid}`)
          .then(response => (this.user = response.data))
    }

    axios
        .get("http://api.askhim.ctrempe.fr:80/type/get-types")
        .then(response => (this.typeServices = response.data))


  },
}
</script>

<style scoped>

</style>
