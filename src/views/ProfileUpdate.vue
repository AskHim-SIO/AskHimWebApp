<template>
  <div class="bg-white">
    <main class="my-8">
      <div class="container mx-auto p-6">
        <!-- component -->
        <form
            id="app"
            action=""
            method="post"
            @submit="updateProfile"
        >
          <div class="w-full px-4 mx-auto">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
              <div class="px-6">
                <div class="flex flex-wrap justify-center">

                  <div class="w-full px-4 flex justify-center">

                    <div class="relative">
                      <img v-if="this.profilePicture" alt="..."
                           class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-150-px"
                           v-bind:src="this.profilePicture">
                    </div>
                  </div>
                  <div class="w-full px-4 text-center mt-20">
                    <input v-model="updateUser.firstname" class="border-2 py-2 px-3 rounded-2xl mt-6 mr-2" type="text"/>
                    <input v-model="updateUser.name" class="border-2 py-2 px-3 rounded-2xl mt-4" type="text"/>
                  </div>
                  <div class="w-full px-4 text-center">
                    <input v-model="updateUser.profilePicture" class="w-1/2 border-2 py-2 px-3 rounded-2xl mt-6 mr-2"
                           placeholder="Inserer votre photo de profil" type="text"/>
                  </div>
                  <div class="w-full px-4 text-center">
                    <input v-model="updateUser.email" class="w-1/2 border-2 py-2 px-3 rounded-2xl mt-6 mr-2"
                           placeholder="Inserer votre adresse e-mail" type="text"/>
                  </div>
                  <div class="w-full px-4 text-center">
                    <div>
                      <input v-model="updateUser.address" class="w-1/2 border-2 py-2 px-3 rounded-2xl mt-6 mr-2"
                             placeholder="Inserer votre adresse" type="text" @input="debounceSearch"/>

                      <div v-if="adresses !== []"
                           class="z-10 text-center   text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1">
                          <li v-for="address in adresses" :key="address.properties.id"
                              class="cursor-pointer" v-on:click="select(address.properties.label)">
                            <p class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                              {{ address.properties.label }}</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div>
                    <h1 class="pt-4">Date de naissance</h1>
                    <datepicker v-model="updateUser.dateNaiss" :language="fr"
                                placeholder="Inserez votre date de naissance"></datepicker>
                  </div>
                  <div class="w-full px-4 text-center">
                    <input v-model="updateUser.tel" class="w-1/2 border-2 py-2 px-3 rounded-2xl mt-6 mr-2"
                           placeholder="Votre numéro de téléphone" type="number" @input="debounceSearch"/>
                  </div>
                </div>
                <div class="flex flex-row-reverse">
                  <buttonBlue name="Modifier le profil"></buttonBlue>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </main>
  </div>
</template>

<script>
import store from "../store";
import router from "../router";
import axios from "axios";
import Datepicker from "vuejs-datepicker";
import {fr} from 'vuejs-datepicker/dist/locale'
import buttonBlue from "../components/buttonBlue";

export default {
  components: {Datepicker, buttonBlue},
  name: "ProfileUpdate",
  data: function () {
    return {
      adresses: [],
      fr: fr,
      updateUser: {}
    }
  },
  methods: {
    debounceSearch(event) {
      clearTimeout(this.debounce)
      this.debounce = setTimeout(() => {
        axios
            .get('https://api-adresse.data.gouv.fr/search/?q=' + event.target.value + '&type=housenumber&autocomplete=1')
            .then(response => {
              this.adresses = response.data.features
            })
      }, 600)
    },
    deconnexion: function () {
      store.commit('logOut');
      router.push({name: 'Home'})
    },
    select(value) {
      this.updateUser.address = value;
      this.adresses = []
    },
    updateProfile: function (e) {
      axios.get(`http://api.askhim.ctrempe.fr:80/user/get-user-by-token/${this.guid}`)
          .then(response => {
            if(!this.updateUser.profilePicture){
              this.updateUser.profilePicture = 'http://cdn.askhim.ctrempe.fr/defaultUser.png'
            }
            axios.put(`http://api.askhim.ctrempe.fr/user/update-user/${this.guid}`, {
              address: this.updateUser.address,
              admin: this.updateUser.admin,
              credit: this.updateUser.credit,
              dateNaiss: this.updateUser.dateNaiss,
              email: this.updateUser.email,
              firstname: this.updateUser.firstname,
              id: response.data.id,
              name: this.updateUser.name,
              profilPicture: this.updateUser.profilePicture,
              tel: this.updateUser.tel,
            })
                .then((res) => {
                  if(res.status === 202){
                    router.push({name: 'Profile'})
                  }
                })
                .catch(function (error) {
                  console.log(error);
                });
          })

      e.preventDefault();
    }
  },
  computed: {
    guid() {
      return store.state.guid;
    },
    profilePicture() {
      return store.state.profile.profilePicture;
    }
  },
  mounted() {
    axios
        .get('http://api.askhim.ctrempe.fr:80/user/get-user-by-token/' + this.guid)
        .then(response => {
          this.updateUser = response.data
        })
  }
}
</script>

<style scoped>

</style>
