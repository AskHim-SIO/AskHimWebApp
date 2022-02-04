<template>
  <div class="bg-white">
    <main class="my-8">
      <div class="container mx-auto p-6">
        <!-- component -->
        <div class="w-full px-4 mx-auto">
          <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
            <div class="px-6">
              <div class="flex flex-wrap justify-center">
                <div class="w-full px-4 flex justify-center">
                  <div class="relative">
                    <img alt="..." v-if="this.profilePicture !== ''" v-bind:src="this.profilePicture"
                         class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                    <img alt="..." v-else src="http://cdn.askhim.ctrempe.fr/userPicture.png"
                         class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px">
                  </div>
                </div>
                <div class="w-full px-4 text-center mt-20">
                  <h3 class="text-xl font-semibold leading-normal mt-4 text-blueGray-700 mb-2">
                    {{ this.firstname }} {{ this.name }}
                  </h3>
                </div>
                <div class="w-full px-4 text-center">
                  <div class="flex justify-center py-4 lg:pt-4 pt-8">
                    <div class="mr-4 p-3 text-center">
                      <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">22</span>
                      <span class="text-sm text-blueGray-400">Services ont été résolu</span>
                    </div>
                    <div class="mr-4 p-3 text-center">
                      <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"> 10 </span>
                      <span class="text-sm text-blueGray-400">Services lui ont été demandé</span>
                    </div>
                    <div class="mr-4 p-3 text-center">
                      <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600"> 5 </span>
                      <span class="text-sm text-blueGray-400">Services favoris</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center mt-6">
                <h3 class="text-xl font-semibold leading-normal mb-2 text-blueGray-700 mb-2">
                  Informations :
                </h3>
                <div class="text-sm leading-normal mt-0 mb-2 text-blueGray-400 font-bold uppercase">
                  <i class="fas fa-map-marker-alt mr-2 text-lg text-blueGray-400"></i>
                  Los Angeles, California
                </div>
                <div class="mb-2 text-blueGray-600 mt-10">
                  <i class="fas fa-briefcase mr-2 text-lg text-blueGray-400"></i>
                  Solution Manager - Creative Tim Officer
                </div>
                <div class="mb-2 text-blueGray-600">
                  <i class="fas fa-university mr-2 text-lg text-blueGray-400"></i>
                  University of Computer Science
                </div>
              </div>
              <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                <div class="flex flex-wrap justify-center">
                  <div class="w-full lg:w-9/12 px-4">
                    <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                      An artist of considerable range, Jenna the name taken
                      by Melbourne-raised, Brooklyn-based Nick Murphy
                      writes, performs and records all of his own music,
                      giving it a warm, intimate feel with a solid groove
                      structure. An artist of considerable range.
                    </p>
                    <div class="flex justify-center">
                      <div class="pt-2">
                        <button type="submit" v-on:click="deconnexion"
                                class="text-white bg-[#ff0000] hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                          Se deconnecter
                        </button>
                      </div>
                      <div>
                        <buttonBlue type="class" name="Modifier le profil"></buttonBlue>
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

export default {
  components: {ButtonBlue},
  name: "Profile",

  methods: {
    deconnexion: function () {
      store.commit('logOut');
      window.location.href = '/';
    }
  },
  computed: {
    firstname() {
      return store.state.profile.firstname;
    },
    guid() {
      return store.state.guid;
    },
    name() {
      return store.state.profile.name;
    },
    profilePicture() {
      return store.state.profile.profilePicture;
    }
  },
}
</script>

<style scoped>

</style>
