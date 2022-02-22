<template>
  <!-- component -->
  <div class="flex justify-center my-6">
    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
      <div class="p-4 bg-gray-100 rounded-full">
        <h1 class="ml-2 font-bold uppercase">Photos</h1>
      </div>

      <div class="flex-1 pt-2">
        <div id="app" class="flex flex-row ">
          <div v-for="(image, i) in images" :key="i" class="ml-4">
            <img :src="image" class="image cursor-pointer" @click="index = i">
          </div>
          <vue-gallery-slideshow :images="images" :index="index" @close="index = null"></vue-gallery-slideshow>
        </div>
      </div>

      <div>
        <hr class="pb-6 mt-6">
        <div class="my-4 mt-6 -mx-2 lg:flex">
          <div class="lg:px-2 lg:w-1/2">
            <div class="p-4 bg-gray-100 rounded-full">
              <h1 class="ml-2 font-bold uppercase">Intitulé : {{ service.name }}</h1>
            </div>
            <div class="p-4">
              <p class="mb-4 italic">Description : {{ service.description }}</p>
              <p v-on:click="goProfil" class="cursor-pointer mb-4 italic">De : {{ user.firstname }} {{ user.name }}</p>
              <p v-if="dateStart !== dateEnd" class="mb-4 italic">Du : {{ dateStart }} au {{ dateEnd }}</p>
              <p v-else class="mb-4 italic">Le : {{ dateStart }}</p>
              <p class="mb-4 italic">Salaire : {{ service.price }} €</p>
              <p v-if="type.libelle !== 'Transport'" class="mb-4 italic">Adresse : {{lieu.adresse}} - {{ lieu.ville }} - {{lieu.codePostal}} </p>
            </div>

            <div v-if="type.libelle === 'Transport'">
              <div class="p-4 mt-6 bg-gray-100 rounded-full">
                <h1 class="ml-2 font-bold uppercase">Catégorie : {{ type.libelle }}</h1>
              </div>
              <div class="p-4">
                <p class="mb-4 italic">Point de départ : {{ service.pointArriver }}</p>
                <p class="mb-4 italic">Point d'arrivée : {{ service.pointDepart }}</p>
                <p class="mb-4 italic">Place : {{ service.nbPlaceDispo }} places disponibles</p>
                <p class="mb-4 italic">Véhicule : {{ service.vehiculePerso }}</p>
                <p class="mb-4 italic">Motif : {{ motif }}</p>
              </div>
            </div>
            <div v-if="type.libelle === 'Course'">
              <div class="p-4 mt-6 bg-gray-100 rounded-full">
                <h1 class="ml-2 font-bold uppercase">Catégorie : {{ type.libelle }}</h1>
              </div>
              <div class="p-4">
                <p class="mb-4 italic">Commerce : {{ service.typeLieu }}</p>
                <p v-if="service.accompagnement" class="mb-4 italic">Accompagnement : Oui</p>
                <p v-else class="mb-4 italic">Accompagnement : Non</p>
              </div>
            </div>
            <div v-if="type.libelle === 'Formation'">
              <div class="p-4 mt-6 bg-gray-100 rounded-full">
                <h1 class="ml-2 font-bold uppercase">Catégorie : {{ type.libelle }}</h1>
              </div>
              <div class="p-4">
                <p class="mb-4 italic">Compétence recherché : {{ service.competence }}</p>
                <p class="mb-4 italic">Nombre d'heure souhaité : {{ service.nbHeure }} heures</p>
                <p class="mb-4 italic">Présence : {{ service.presence }}</p>
                <p class="mb-4 italic">Matériel :</p>
                <ul class="border ml-4">
                  <li>
                    {{ service.materiel }}
                  </li>
                </ul>
              </div>
            </div>
            <div v-if="type.libelle === 'Loisir'">
              <div class="p-4 mt-6 bg-gray-100 rounded-full">
                <h1 class="ml-2 font-bold uppercase">Catégorie : {{ type.libelle }}</h1>
              </div>
              <div class="p-4">
                <p v-if="service.nbPersonne === 0 || service.nbPersonne === 1" class="mb-4 italic">Nombre de personnes : {{ service.nbPersonne }} personne</p>
                <p v-else class="mb-4 italic">Nombre de personnes : {{ service.nbPersonne }} personnes</p>
                <p class="mb-4 italic">Jeu : {{ service.jeu }}</p>
                <p  v-if="service.animal" class="mb-4 italic">Animal : Oui</p>
                <p v-else class="mb-4 italic">Animal : Non</p>
              </div>
            </div>
            <div v-if="type.libelle === 'Tâche ménagère'">
              <div class="p-4 mt-6 bg-gray-100 rounded-full">
                <h1 class="ml-2 font-bold uppercase">Catégorie : {{ type.libelle }}</h1>
              </div>
                <p class="pt-2 mb-4 italic">Tâche à faire : {{ service.libelle }}</p>
                <p v-if="service.nbHeure === 0 || service.nbHeure === 1" class="mb-4 italic">1 heure requise</p>
                <p v-else class="mb-4 italic">Nombres d'heures requises : {{ service.nbHeure }}</p>
                <p class="mb-4 italic">Matériel :</p>
                <ul class="border ml-4">
                  <li>
                    {{ service.materiel }}
                  </li>
                </ul>
            </div>
          </div>

          <div class="lg:px-2 lg:w-1/2">
            <div class="p-4 bg-gray-100 rounded-full">
              <h1 class="ml-2 font-bold uppercase">Order Details</h1>
            </div>
            <div class="mt-2">
              <template>
                <l-map :center="center" :zoom="zoom" style="height: 300px">
                  <l-tile-layer :url="url"></l-tile-layer>
                  <l-marker :lat-lng="markerLatLng"></l-marker>
                  <l-marker v-if="markerLatLng2 !== null" :lat-lng="markerLatLng2"></l-marker>
                </l-map>
              </template>
              <a href="#">
                <button :disabled='isDisabled'
                        class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none"
                        v-on:click="initMessage">
                  <svg aria-hidden="true" class="iconify iconify--ic" height="32"
                       preserveAspectRatio="xMidYMid meet" role="img" viewBox="0 0 24 24" width="32"
                       xmlns="http://www.w3.org/2000/svg"
                       xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="M22 2H2.01L2 22l4-4h16V2zm-4 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"
                          fill="#333aff"></path>
                  </svg>
                  <span class="ml-2 mt-5px">{{ buttonValue }}</span>
                </button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import VueGallerySlideshow from 'vue-gallery-slideshow';
import moment from "moment";
import 'moment/locale/fr'
import store from "../store";

export default {
  name: "Service",
  components: {VueGallerySlideshow},
  data() {
    return {
      id: this.$route.params.id,
      service: {},
      isDisabled: false,
      buttonValue: "Envoyer un message",
      type: {},
      user: {},
      lieu: {},
      motif: {},
      dateStart: '',
      dateEnd: '',
      cpt: 0,
      images: [],
      index: null,
      url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',

      zoom: 15,
      center: [48.857170000000053, 2.3414000000000215],
      markerLatLng: [48.857170000000053, 2.3414000000000215],
      markerLatLng2: null,
    }
  },
  methods: {
    initMessage() {
      axios
          .post(`http://api.askhim.ctrempe.fr/chat/init-discussion?serviceId=${this.id}&userToken=${store.state.guid}`)
          .then((res) => {
            this.$router.push({
              name: 'Chat',
              params: { chatService: res.data }
            });

          })
    },
    goProfil(){
      this.$router.push({
        name: 'Profile',
        params: { id: this.user.id }
      });
    }
  },
  mounted() {
    axios
        .get('http://api.askhim.ctrempe.fr/service/get-service/' + this.id)
        .then(response => {
          if (response.data.state === false) {
            this.$router.push('/home');
          } else {

            this.service = response.data
            this.type = response.data.type
            this.user = response.data.user
            this.lieu = response.data.lieu
            this.motif = response.data.motif

            this.dateStart = moment.unix(response.data.dateStart / 1000).format("DD  MMMM YYYY")
            this.dateEnd = moment.unix(response.data.dateEnd / 1000).format("DD  MMMM YYYY")

            response.data.photos.forEach(element => {
              this.images.push(element.libelle)
            })
          }

        })
        .then(() => {
          if (this.type.libelle === "Transport") {
            axios
                .get('https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/findAddressCandidates?singleLine=' + this.service.pointArriver + '&preferredLabelValues=primaryStreet&outFields=Match_addr,StAddr&maxLocations=1&forStorage=false&f=pjson')
                .then(response => {
                  response.data.candidates.forEach(loc => {
                    this.center = [loc.location.y, loc.location.x]
                    this.markerLatLng = [loc.location.y, loc.location.x]
                  })
                })
            axios
                .get('https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/findAddressCandidates?singleLine=' + this.service.pointDepart + '&preferredLabelValues=primaryStreet&outFields=Match_addr,StAddr&maxLocations=1&forStorage=false&f=pjson')
                .then(response => {
                  response.data.candidates.forEach(loc => {
                    this.markerLatLng2 = [loc.location.y, loc.location.x]
                  })
                })
          } else {
            axios
                .get('https://geocode.arcgis.com/arcgis/rest/services/World/GeocodeServer/findAddressCandidates?singleLine=' + this.lieu.ville + '&preferredLabelValues=primaryStreet&outFields=Match_addr,StAddr&maxLocations=1&forStorage=false&f=pjson')
                .then(response => {
                  response.data.candidates.forEach(loc => {
                    this.center = [loc.location.y, loc.location.x]
                    this.markerLatLng = [loc.location.y, loc.location.x]
                  })
                })
          }
        })
    axios
        .get(`http://api.askhim.ctrempe.fr:80/user/get-user-by-token/${store.state.guid}`)
        .then(res => {
          axios
              .get(`http://api.askhim.ctrempe.fr:80/service/get-services-from-user-by-id/${res.data.id}`)
              .then((res) => {
                res.data.forEach(service => {
                  if (service.id == this.id) {
                    this.isDisabled = true,
                    this.buttonValue = "Ce service est à vous"
                  }
                })
              })
        })


  }
}
</script>

<style scoped>
img {
  width: 150px;
  border-radius: 2px;
  box-shadow: 1px 1px 3px 1px rgba(0, 0, 0, 0.5);
  transition: width 1s;
}
</style>
