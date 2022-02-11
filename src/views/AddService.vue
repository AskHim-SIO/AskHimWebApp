<template>
  <div>
    <form method="POST" action="" @submit="checkForm">
      <div class="bg-white">
        <div class="container mx-auto px-40">

          <div v-if="errors.length"
               class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
               role="alert">
            <ul>
              <li v-for="error in errors" :key="error">
                <span>{{ error }}</span></li>
            </ul>
          </div>

          <h3 class="text-gray-600 text-2xl font-medium pb-2">Ajouter un service</h3>


          <div class="mb-4 h-full flex flex-col bg-white shadow-xl rounded-md">
            <div class="flex flex-row">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">Type de service</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <select class="form-select appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        aria-label="Default select example" id="select" v-model="selected">
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
                       placeholder="Inserer l'objet de votre demande" v-model="name"/>
              </div>
            </div>
            <div class="flex flex-row mb-2">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">Rémunération</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <input type="number" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       placeholder="Inserer l'objet de votre demande" v-model="price"/>
              </div>
            </div>
            <div class="flex flex-row">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">dateStart</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <div>
                  <datepicker :language="fr" class="w-full" placeholder="Date du départ"
                              v-model="dateStart"></datepicker>
                </div>
              </div>
            </div>
            <div class="flex flex-row">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">dateEnd</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <div>
                  <datepicker :language="fr" class="w-full" placeholder="Date fin"
                              v-model="dateEnd"></datepicker>
                </div>
              </div>
            </div>

            <div class="flex flex-row">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">Description</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Votre
                  description</label>
                <textarea id="message" v-model="description" rows="4"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Que voulez vous faire ?"></textarea>
              </div>
            </div>
          </div>

          <h3 v-if="selected !== 'Choisir une catégorie'" class="text-gray-600 text-2xl font-medium pb-2">Information
            supplémentaire pour un/une {{ selected.libelle }}</h3>
          <div v-if="selected !== 'Choisir une catégorie'"
               class="mb-4 h-full flex flex-col bg-white shadow-xl rounded-md">
            <div>
              <div v-if="selected.libelle === 'Transport'">

                <div class="flex flex-row">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Pourquoi avez vous besoin de vous déplacer ?</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <label for="motif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Un
                      motif</label>
                    <textarea id="motif" v-model="addTransport.motif" rows="4"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Votre vos raisons"></textarea>
                  </div>
                </div>

                <div class="flex flex-row mb-2">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Nombre de places disponibles</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <input type="number" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Nombres de places disponibles" v-model="addTransport.nbPlaceDispo"
                           maxlength="10"/>
                  </div>
                </div>

                <div class="flex flex-row mb-2">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Point de départ</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <input type="select" v-model="addTransport.pointArriver" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Inserer votre adresse" @input="debounceSearchPointArriver"/>
                    <div v-if="adresses != []"
                         class="z-10  text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                      <ul class="py-1">
                        <li v-for="address in adressesPointArriver" :key="address.properties.id"
                            v-on:click="selectPointArriver(address.properties.label)" class="cursor-pointer">
                          <p
                              class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            {{ address.properties.label }}</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="flex flex-row mb-2">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Point d'arrivé</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <input type="select" v-model="addTransport.pointDepart" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Inserer votre adresse" @input="debounceSearchPointDepart"/>
                    <div v-if="adresses != []"
                         class="z-10  text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                      <ul class="py-1">
                        <li v-for="address in adressesPointDepart" :key="address.properties.id"
                            v-on:click="selectPointDepart(address.properties.label)" class="cursor-pointer">
                          <p
                              class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            {{ address.properties.label }}</p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="flex flex-row mb-2">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Votre véhicule</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <input class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Inserer le nom de votre véhicule" v-model="addTransport.vehiculePerso"/>
                  </div>
                </div>
              </div>


              <div v-if="selected.libelle === 'Course'">
                <div class="flex flex-row">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Type de course</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                  transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                            aria-label="Default select example" ref="select">
                      <option selected>Choisir une catégorie</option>

                    </select>
                  </div>
                </div>
              </div>
            </div>
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

                <div v-if="adresses != []"
                     class="z-10  text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                  <ul class="py-1">
                    <li v-for="address in adresses" :key="address.properties.id"
                        v-on:click="select(address.properties.label)" class="cursor-pointer">
                      <p class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                        {{ address.properties.label }}</p>
                    </li>
                  </ul>
                </div>

              </div>
            </div>
          </div>

          <h3 class="text-gray-600 text-2xl font-medium pb-2">Vos photos</h3>
          <uploadFile class="mb-2"></uploadFile>
          <div>
            <button-blue class="flex flex-row-reverse" name="Ask Him !"></button-blue>
          </div>
        </div>
      </div>
    </form>
  </div>

</template>

<script>
import uploadFile from "../components/uploadFile";
import axios from "axios";
import Datepicker from "vuejs-datepicker";
import {fr} from "vuejs-datepicker/dist/locale";
import ButtonBlue from "../components/buttonBlue";
import store from "../store";

export default {
  name: "AddService",
  components: {uploadFile, Datepicker, ButtonBlue},
  data: function () {
    return {
      types: [],
      errors: [],
      selectAdress: '',
      adresses: [],
      adressesDetail: [],
      adressesPointArriver: [],
      adressesPointDepart: [],
      selected: 'Choisir une catégorie',
      debounce: null,
      fr: fr,

      dateEnd: null,
      dateStart: null,
      description: "",
      lieuAdresse: "",
      lieuCodePostal: 0,
      lieuVille: "",
      name: "",
      price: 0,

      addTransport: {
        dateEnd: null,
        dateStart: null,
        description: "",
        lieuAdresse: "",
        lieuCodePostal: 0,
        lieuVille: "",
        motif: "",
        name: "",
        nbPlaceDispo: 0,
        pointArriver: "",
        pointDepart: "",
        price: 0,
        userToken: "",
        vehiculePerso: ""
      },

      addCourse: {
        accompagnement : "",
        dateEnd: null,
        dateStart: null,
        description: "",
        lieuAdresse: "",
        lieuCodePostal: 0,
        lieuVille: "",
        name: "",
        price: 0,
        typeLieu: "",
        userToken: ""
      },


    }
  }
  ,
  methods: {
    checkForm: function (e) {
      this.errors = [];

      if (this.selected != "Choisir une catégorie") {

        if (this.selected.libelle === "Transport") {

          if (!this.addTransport.nbPlaceDispo) {
            this.errors.push("Indiquez combien de place ils vous restent");
          }

          if (!this.addTransport.pointDepart) {
            this.errors.push("Indiquez d'où vous partez");
          }

          if (!this.addTransport.pointArriver) {
            this.errors.push("Indiquez où vous arrivez ");
          }

          if (!this.addTransport.motif) {
            this.errors.push("Il n'y a pas de motif");
          }

        }
      } else {
        this.errors.push("Choisissez un type de service");
      }

      if (!this.adressesDetail) {
        this.errors.push('L\'adresse n\'est pas valide.');
      }

      if (!this.dateEnd) {
        this.errors.push("il n'y a pas de date de fin");
      }

      if (!this.dateStart) {
        this.errors.push("il n'y a pas de date de départ");
      }
      if (!this.description) {
        this.errors.push("Il n'y a pas de description");
      }

      if (!this.name) {
        this.errors.push("Il n'y a pas de nom");
      }

      if (!this.price) {
        this.errors.push("Indiquez une rémunération ");
      } else {
        if (this.price <= 0 || this.price >= 999) {
          this.errors.push("Le prix est incorrect");
        }
      }

      if (!this.errors.length) {
        this.addTransport.userToken = store.state.guid

        this.lieuVille = this.adressesDetail.city
        this.lieuCodePostal = this.adressesDetail.citycode
        this.lieuAdresse = this.adressesDetail.name

        if (this.selected.libelle === "Transport") {
          this.addTransport.dateEnd = this.dateEnd
          this.addTransport.dateStart = this.dateStart
          this.addTransport.description = this.description
          this.addTransport.lieuAdresse = this.lieuAdresse
          this.addTransport.lieuCodePostal = this.lieuCodePostal
          this.addTransport.lieuVille = this.lieuVille
          this.addTransport.name = this.name
          this.addTransport.price = this.price

          axios.post('http://api.askhim.ctrempe.fr:80/service/create-transport-service', this.addTransport)
              .then((res) => {
                console.log(res)
              })
              .catch(e)
          {
            console.log(e)
          }
        }
      }


      e.preventDefault();

    },


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
    debounceSearchPointArriver(event) {

      clearTimeout(this.debounce)

      this.debounce = setTimeout(() => {

        axios
            .get('https://api-adresse.data.gouv.fr/search/?q=' + event.target.value + '&type=housenumber&autocomplete=1')
            .then(response => (this.adressesPointArriver = response.data.features))
      }, 600)
    },
    debounceSearchPointDepart(event) {

      clearTimeout(this.debounce)

      this.debounce = setTimeout(() => {

        axios
            .get('https://api-adresse.data.gouv.fr/search/?q=' + event.target.value + '&type=housenumber&autocomplete=1')
            .then(response => (this.adressesPointDepart = response.data.features))
      }, 600)
    },
    select(value) {
      this.selectAdress = value
      this.adresses.forEach(adresse => {
        if (value === adresse.properties.label) {
          this.adressesDetail = adresse.properties
        }
      })
      this.adresses = []
    },
    selectPointArriver(value) {
      this.addTransport.pointArriver = value
      this.adressesPointArriver = []
    },
    selectPointDepart(value) {
      this.addTransport.pointDepart = value
      this.adressesPointDepart = []
    },
  }
  ,
  mounted() {
    axios
        .get('http://api.askhim.ctrempe.fr/type/get-types')
        .then(response => (this.types = response.data))
  }
}
</script>

<style scoped>

</style>
