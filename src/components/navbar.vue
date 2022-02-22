<template>
  <!-- component -->
  <div class="bg-gray-100 border-gray-200 font-sans w-full m-0">
    <div class="bg-white shadow">
      <div class="container mx-auto px-4">
        <div class="flex items-center justify-between py-4">
          <div>
            <router-link to="/home">
              <img src="http://cdn.askhim.ctrempe.fr/logo-black.png" class="w-12 h-auto ">
            </router-link>
          </div>

          <div class="hidden sm:flex sm:items-center">
            <a href="#" class="text-gray-800 text-sm font-semibold hover:text-[#2B6CF2] mr-4">
              <router-link to="/rechercher">Rechercher</router-link>
            </a>
            <a href="#" class="text-gray-800 text-sm font-semibold hover:text-[#2B6CF2] mr-4">
              <router-link to="/ajouter-service">Ajouter un service</router-link>
            </a>
            <a href="#" class="text-gray-800 text-sm font-semibold hover:text-[#2B6CF2]">
              <router-link to="/contact">Contact</router-link>
            </a>
          </div>

          <!-- -- N'est pas connecté -- -->
          <div v-if="!guid" class="hidden sm:flex sm:items-center">
            <a href="#" class="text-gray-800 text-sm font-semibold hover:text-[#2B6CF2] mr-4">
              <router-link to="/se-connecter">Se connecter</router-link>
            </a>
            <a href="#" class="text-gray-800 text-sm font-semibold border px-4 py-2 rounded-lg hover:text-[#2B6CF2] hover:border-[#2B6CF2]">
              <router-link to="/rejoindre">S'inscrire</router-link>
            </a>
          </div>

          <!-- -- est connecté -- -->
          <div v-if="guid" class="hidden sm:flex sm:items-center">
            <button type="button"
                    class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                    id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
              <span class="sr-only">Ouvrir le menu</span>
              <img class="relative w-8 h-8 rounded-full" v-bind:src="this.profilePicture"
                   alt="user photo">
              <span v-if="newMsg" class="absolute ml-5 -mt-2 px-2.5 py-0.5 bg-yellow-500 rounded-full text-xs">{{ nbMsg }}</span>
            </button>
          </div>

          <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
               id="dropdown">
            <div class="py-3 px-4">
                            <span
                                class="block text-sm text-gray-900 dark:text-white">{{ this.name }} </span>
              <span
                  class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ this.firstname }}</span>
            </div>
            <ul class="py-1" aria-labelledby="dropdown">
              <router-link to="/profile"><li><a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Mon profil </a></li></router-link>
              <router-link to="/chat"><li>
                <a href="#"
                   class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Mes messages <span v-if="newMsg" class="ml-5 -mt-2 px-2.5 py-0.5 bg-yellow-500 rounded-full text-xs">!</span></a>
              </li></router-link>
              <li v-if="this.isAdmin">
                <a href="http://localhost:8081/"
                   class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Pannel admin</a>
              </li>
              <li>
                <a href="/" v-on:click="deconnexion"
                   class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Se deconnecter</a>
              </li>
            </ul>
          </div>

          <button data-collapse-toggle="mobile-menu-2" type="button"
                  class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                  aria-controls="mobile-menu-2" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
            </svg>
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                 xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
          </button>
        </div>

        <div class="hidden block sm:hidden bg-white border-t-2 py-2" id="mobile-menu-2">
          <div class="flex flex-col">
            <a href="#" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mb-1" aria-current="page">Rechercher</a>
            <a href="#" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mb-1" aria-current="page">Ajouter un service</a>
            <a href="#" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mb-1" aria-current="page">En savoir plus</a>
            <a href="#" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mb-1" aria-current="page">Contact</a>
            <div v-if="!guid" class="flex justify-between items-center border-t-2 pt-2">
              <a href="#" class="text-gray-800 text-sm font-semibold hover:text-purple-600 mr-4" aria-current="page">Se connecter</a>
              <a href="#" class="text-gray-800 text-sm font-semibold border px-4 py-1 rounded-lg hover:text-purple-600 hover:border-purple-600" aria-current="page">S'inscrire</a>
            </div>
            <div v-if="guid" class="flex justify-between items-center border-t-2 pt-2">
              <button type="button"
                      class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                      aria-expanded="false" data-dropdown-toggle="dropdown">
                <span class="sr-only">Ouvrir le menu</span>
                <img class="w-8 h-8 rounded-full" src="http://cdn.askhim.ctrempe.fr/userPicture.png"
                     alt="user photo">
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import store from "../store";
import router from "../router";

export default {
  name: 'navbar',

  methods: {
    deconnexion: function () {
      store.commit('logOut');
      router.push({ name: 'Home'})
    }
  },
  computed: {
    firstname(){
      return store.state.profile.firstname;
    },
    name(){
      return store.state.profile.name;
    },
    profilePicture(){
      return store.state.profile.profilePicture;
    },
    isAdmin(){
      return store.state.profile.isAdmin;
    },
    guid(){
      return store.state.guid;
    },
    newMsg(){
      return store.state.msg.newMsg;
    },
    nbMsg(){
      return store.state.msg.nbMsg;
    }
  },
  mounted() {

  }


}
</script>
