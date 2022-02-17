<template>
  <div>
    <form action="" method="POST" @submit="checkForm">
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
                <select id="select"
                        v-model="selected" aria-label="Default select example" class="form-select appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">
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
                <input v-model="name"
                       class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       placeholder="Inserer l'objet de votre demande"/>
              </div>
            </div>
            <div class="flex flex-row mb-2">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">Rémunération</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <input v-model="price" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       placeholder="Inserer l'objet de votre demande" type="number"/>
              </div>
            </div>
            <div class="flex flex-row">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">Date du service</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <div>
                  <datepicker v-model="dateStart" :language="fr" class="w-full"
                              placeholder="Date du départ"></datepicker>
                </div>
              </div>
            </div>
            <div class="flex flex-row">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">Sur plusieurs jours ?</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <label class="flex relative items-center mb-4 cursor-pointer" for="toggle-example4">
                  <input id="toggle-example4" v-model="plusieurJoursBool" class="sr-only"
                         type="checkbox" v-on:click="plusieursJoursOnClick">
                  <div
                      class="w-11 h-6 bg-gray-200 rounded-full border border-gray-200 toggle-bg dark:bg-gray-700 dark:border-gray-600"></div>
                  <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ plusieurJours }}</span>
                </label>
              </div>
            </div>
            <div v-if="plusieurJoursBool" class="flex flex-row">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">Jusqu'au ?</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <div>
                  <datepicker v-model="dateEnd" :language="fr" class="w-full"
                              placeholder="Date fin"></datepicker>
                </div>
              </div>
            </div>

            <div class="flex flex-row">
              <div class="basis-1/2 m-3 mt-6">
                <p class="text-gray-600 text-2md font-medium pt-3">Description</p>
              </div>
              <div class="basis-1/2 m-3 mt-6">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="message">Votre
                  description</label>
                <textarea id="message" v-model="description"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Que voulez vous faire ?"
                          rows="4"></textarea>
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
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="motif">Un
                      motif</label>
                    <textarea id="motif" v-model="addTransport.motif"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Votre vos raisons"
                              rows="4"></textarea>
                  </div>
                </div>

                <div class="flex flex-row mb-2">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Nombre de places disponibles</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <input v-model="addTransport.nbPlaceDispo" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           maxlength="10" placeholder="Nombres de places disponibles"
                           type="number"/>
                  </div>
                </div>

                <div class="flex flex-row mb-2">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Point de départ</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <input v-model="addTransport.pointArriver" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Inserer votre adresse"
                           type="select" @input="debounceSearchPointArriver"/>
                    <div v-if="adresses != []"
                         class="z-10  text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                      <ul class="py-1">
                        <li v-for="address in adressesPointArriver" :key="address.properties.id"
                            class="cursor-pointer" v-on:click="selectPointArriver(address.properties.label)">
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
                    <input v-model="addTransport.pointDepart" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Inserer votre adresse"
                           type="select" @input="debounceSearchPointDepart"/>
                    <div v-if="adresses != []"
                         class="z-10  text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                      <ul class="py-1">
                        <li v-for="address in adressesPointDepart" :key="address.properties.id"
                            class="cursor-pointer" v-on:click="selectPointDepart(address.properties.label)">
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
                    <input v-model="addTransport.vehiculePerso"
                           class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Inserer le nom de votre véhicule"/>
                  </div>
                </div>
              </div>

              <div v-if="selected.libelle === 'Formation'">

                <div class="flex flex-row">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Compétence à valider</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="message">Que
                      voulez vous apprendre ?</label>
                    <textarea v-model="addFormation.competence"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Que voulez vous apprendre ?"
                              rows="4"></textarea>
                  </div>
                </div>

                <div class="flex flex-row">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Le materiel requis</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="message">De quoi
                      avez vous besoins ?</label>
                    <textarea v-model="addFormation.materiel"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Listez ce dont vous avez besoins ?"
                              rows="4"></textarea>
                  </div>
                </div>

                <div class="flex flex-row">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Présentiel ou distanciel ?</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <label class="flex relative items-center mb-4 cursor-pointer" for="toggle-example">
                      <input id="toggle-example" v-model="addFormation.presence" class="sr-only"
                             type="checkbox" v-on:click="presenceOnClick">
                      <div
                          class="w-11 h-6 bg-gray-200 rounded-full border border-gray-200 toggle-bg dark:bg-gray-700 dark:border-gray-600"></div>
                      <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ presence }}</span>
                    </label>
                  </div>
                </div>

                <div class="flex flex-row mb-2">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Nombre d'heures requises</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <input v-model="addFormation.nbHeure" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Le nombre d'heures requises" type="number"/>
                  </div>
                </div>
              </div>

              <div v-if="selected.libelle === 'Loisir'">
                <div class="flex flex-row">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Présence animal ?</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <label class="flex relative items-center mb-4 cursor-pointer" for="toggle-example2">
                      <input id="toggle-example2" v-model="addLoisir.animal" class="sr-only"
                             type="checkbox" v-on:click="presenceAnimalOnClick">
                      <div
                          class="w-11 h-6 bg-gray-200 rounded-full border border-gray-200 toggle-bg dark:bg-gray-700 dark:border-gray-600"></div>
                      <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                          presenceAnimal
                        }}</span>
                    </label>
                  </div>
                </div>
                <div class="flex flex-row mb-2">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Nombre de personnes</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <input v-model="addLoisir.nbPersonne" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Inserer l'objet de votre demande" type="number"/>
                  </div>
                </div>
                <div class="flex flex-row">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Loisir à faire</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400" for="loisir">Votre
                      loisir</label>
                    <textarea id="loisir" v-model="addLoisir.jeu"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Quel loisir pour vous ?"
                              rows="4"></textarea>
                  </div>
                </div>
              </div>
              <div v-if="selected.libelle === 'Tâche ménagère'">
                <div class="flex flex-row mb-2">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Materiels</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <textarea v-model="addTacheMenagere.materiel" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                              placeholder="Tout ce dont vous avez besoins"/>
                  </div>
                </div>

                <div class="flex flex-row mb-2">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Tâche à faire</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <input v-model="addTacheMenagere.libelle" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Nettoyer ma maison, tondre ma pelouse..."/>
                  </div>
                </div>
                <div class="flex flex-row mb-2">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Nombre d'heure</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <input v-model="addTacheMenagere.nbHeure" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Heures requises pour réaliser la tâche" type="number"/>
                  </div>
                </div>
              </div>

              <div v-if="selected.libelle === 'Course'">
                <div class="flex flex-row mb-2">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Type de lieu</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <input v-model="addCourse.typeLieu" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                           placeholder="Boulangeire, superette..."/>
                  </div>
                </div>

                <div class="flex flex-row">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Serez vous accompagné ?</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <label class="flex relative items-center mb-4 cursor-pointer" for="toggle-example3">
                      <input id="toggle-example3" v-model="addCourse.accompagnement" class="sr-only"
                             type="checkbox" v-on:click="accompagnementOnClick">
                      <div
                          class="w-11 h-6 bg-gray-200 rounded-full border border-gray-200 toggle-bg dark:bg-gray-700 dark:border-gray-600"></div>
                      <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                          accompagnement
                        }}</span>
                    </label>
                  </div>
                </div>

                <div v-if="accompagnement === 'Non'" class="flex flex-row">
                  <div class="basis-1/2 m-3 mt-6">
                    <p class="text-gray-600 text-2md font-medium pt-3">Votre liste de course ?</p>
                  </div>
                  <div class="basis-1/2 m-3 mt-6">
                    <textarea v-model="addCourse.typeLieu" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                              placeholder="Ce que vous voulez"/>
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
                <input v-model="selectAdress" class="appearance-none block w-full px-3 py-1.5 text-base text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded-lg
                                transition ease-in-out m-0  focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                       placeholder="Inserer votre adresse"
                       type="select" @input="debounceSearch"/>

                <div v-if="adresses != []"
                     class="z-10  text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
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
          </div>

          <h3 class="text-gray-600 text-2xl font-medium pb-2">Vos photos</h3>
          <uploadFile class="mb-2" @sendImages="getImages"></uploadFile>
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
import router from "../router";
import {readFile} from "./utils"


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
      presence: 'Distanciel',
      presenceAnimal: 'Non',
      accompagnement: 'Non',
      plusieurJours: 'Non',
      plusieurJoursBool: 0,


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

      addLoisir: {
        animal: false,
        dateEnd: null,
        dateStart: null,
        description: "",
        jeu: "",
        lieuAdresse: "",
        lieuCodePostal: 0,
        lieuVille: "",
        name: "",
        nbPersonne: 0,
        price: 0,
        userToken: "",
      },

      addCourse: {
        accompagnement: "",
        dateEnd: null,
        dateStart: null,
        description: "",
        lieuAdresse: "",
        lieuCodePostal: 0,
        lieuVille: "",
        listeCourse: "",
        name: "",
        price: 0,
        typeLieu: "",
        userToken: ""
      },

      addFormation: {
        competence: "",
        dateEnd: null,
        dateStart: null,
        description: "",
        lieuAdresse: "",
        lieuCodePostal: 0,
        lieuVille: "",
        materiel: "",
        name: "",
        nbHeure: 0,
        presence: "",
        price: "",
        userToken: ""
      },

      addTacheMenagere: {
        dateEnd: null,
        dateStart: null,
        description: "",
        libelle: "",
        lieuAdresse: "",
        lieuCodePostal: 0,
        lieuVille: "",
        materiel: "",
        name: "",
        nbHeure: 0,
        price: "",
        userToken: ""
      },

      jsonImg: {
        fileStr: ""
      },

      images: "",
      config: {
        headers: {
          'Content-Length': 0,
          'Content-Type': 'text/plain'
        },
        responseType: 'text'
      },
    }
  },
  methods: {
    getImages(payload) {
      this.images = payload.images
    },
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
        if (this.selected.libelle === "Formation") {

          if (!this.addFormation.nbHeure) {
            this.errors.push("Indiquez combien d'heures sont requises");
          } else {
            if (this.addFormation.nbHeure <= 0 || this.addFormation.nbHeure >= 999) {
              this.errors.push("Indiquez un nombre valide");
            }
          }

          if (!this.addFormation.materiel) {
            this.errors.push("Indiquez le matériel requis");
          }
        }

        if (this.selected.libelle === "Loisir") {

          if (!this.addLoisir.nbPersonne) {
            this.errors.push("Indiquez combien de personnes seront présentes");
          } else {
            if (this.addLoisir.nbPersonne <= 0 || this.addLoisir.nbPersonne >= 999) {
              this.errors.push("Indiquez un nombre valide");
            }
          }

          if (!this.addLoisir.jeu) {
            this.errors.push("Indiquez les loisirs souhaités");
          }
        }

      } else {
        this.errors.push("Choisissez un type de service");
      }

      if(this.plusieurJoursBool){
        if (!this.dateEnd) {
          this.errors.push("il n'y a pas de date de fin");
        }
      }

      if (!this.adressesDetail) {
        this.errors.push('L\'adresse n\'est pas valide.');
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

        this.lieuVille = this.adressesDetail.city
        this.lieuCodePostal = this.adressesDetail.citycode
        this.lieuAdresse = this.adressesDetail.name

        if (this.selected.libelle === "Transport") {
          this.addTransport.userToken = store.state.guid
          if(this.plusieurJoursBool){
            this.addTransport.dateEnd = this.dateEnd
          }
          else{
            this.addTransport.dateEnd = this.dateStart
          }
          this.addTransport.dateStart = this.dateStart
          this.addTransport.description = this.description
          this.addTransport.lieuAdresse = this.lieuAdresse
          this.addTransport.lieuCodePostal = this.lieuCodePostal
          this.addTransport.lieuVille = this.lieuVille
          this.addTransport.name = this.name
          this.addTransport.price = this.price

          // const config = {
          //   headers: {
          //     'Content-Type': 'text/plain'
          //   },
          //   responseType: 'text'
          // };

          axios.post('http://api.askhim.ctrempe.fr:80/service/create-transport-service', this.addTransport)
              .then((res) => {

                if (this.images) {
                  const arr = this.images.map(file => readFile(file)
                      .then(contenu => {
                            this.jsonImg.fileStr = contenu
                            axios.post(`http://api.askhim.ctrempe.fr:80/photo/save-photo-to-service?serviceId=${res.data}`, this.jsonImg)
                          }
                      ))
                  Promise.all(arr).then(() => {
                    console.log("L'ensemble des appels ajax sont terminés.")

                    router.push({name: 'Service', params: {id: res.data}})
                  })
                } else {
                  router.push({name: 'Service', params: {id: res.data}})
                }
              })
        }
        if (this.selected.libelle === "Formation") {
          this.addFormation.userToken = store.state.guid
          if(this.plusieurJoursBool){
            this.addFormation.dateEnd = this.dateEnd
          }
          else{
            this.addFormation.dateEnd = this.dateStart
          }
          this.addFormation.dateStart = this.dateStart
          this.addFormation.description = this.description
          this.addFormation.lieuAdresse = this.lieuAdresse
          this.addFormation.lieuCodePostal = this.lieuCodePostal
          this.addFormation.lieuVille = this.lieuVille
          this.addFormation.name = this.name
          this.addFormation.price = this.price

          console.log(this.addFormation)
          axios.post('http://api.askhim.ctrempe.fr:80/service/create-formation-service', this.addFormation)
              .then((res) => {

                if (this.images) {
                  const arr = this.images.map(file => readFile(file)
                      .then(contenu => {
                            this.jsonImg.fileStr = contenu
                            axios.post(`http://api.askhim.ctrempe.fr:80/photo/save-photo-to-service?serviceId=${res.data}`, this.jsonImg)
                          }
                      ))
                  Promise.all(arr).then(() => {
                    console.log("L'ensemble des appels ajax sont terminés.")

                    router.push({name: 'Service', params: {id: res.data}})
                  })
                } else {
                  router.push({name: 'Service', params: {id: res.data}})
                }
              })
        }

        if (this.selected.libelle === "Loisir") {
          this.addLoisir.userToken = store.state.guid
          if(this.plusieurJoursBool){
            this.addLoisir.dateEnd = this.dateEnd
          }
          else{
            this.addLoisir.dateEnd = this.dateStart
          }
          this.addLoisir.dateStart = this.dateStart
          this.addLoisir.description = this.description
          this.addLoisir.lieuAdresse = this.lieuAdresse
          this.addLoisir.lieuCodePostal = this.lieuCodePostal
          this.addLoisir.lieuVille = this.lieuVille
          this.addLoisir.name = this.name
          this.addLoisir.price = this.price

          axios.post('http://api.askhim.ctrempe.fr:80/service/create-loisir-service', this.addLoisir)
              .then((res) => {

                if (this.images) {
                  const arr = this.images.map(file => readFile(file)
                      .then(contenu => {
                            this.jsonImg.fileStr = contenu
                            axios.post(`http://api.askhim.ctrempe.fr:80/photo/save-photo-to-service?serviceId=${res.data}`, this.jsonImg)
                          }
                      ))
                  Promise.all(arr).then(() => {
                    console.log("L'ensemble des appels ajax sont terminés.")

                    router.push({name: 'Service', params: {id: res.data}})
                  })
                } else {
                  router.push({name: 'Service', params: {id: res.data}})
                }
              })
        }

        if (this.selected.libelle === "Course") {
          this.addCourse.userToken = store.state.guid
          if(this.plusieurJoursBool){
            this.addCourse.dateEnd = this.dateEnd
          }
          else{
            this.addCourse.dateEnd = this.dateStart
          }
          this.addCourse.dateStart = this.dateStart
          this.addCourse.description = this.description
          this.addCourse.lieuAdresse = this.lieuAdresse
          this.addCourse.lieuCodePostal = this.lieuCodePostal
          this.addCourse.lieuVille = this.lieuVille
          this.addCourse.name = this.name
          this.addCourse.price = this.price
          console.log(this.addCourse)

          axios.post('http://api.askhim.ctrempe.fr/service/create-course-service', this.addCourse)
              .then((res) => {

                if (this.images) {
                  const arr = this.images.map(file => readFile(file)
                      .then(contenu => {
                            this.jsonImg.fileStr = contenu
                            axios.post(`http://api.askhim.ctrempe.fr/photo/save-photo-to-service?serviceId=${res.data}`, this.jsonImg)
                          }
                      ))
                  Promise.all(arr).then(() => {
                    console.log("L'ensemble des appels ajax sont terminés.")

                    router.push({name: 'Service', params: {id: res.data}})
                  })
                } else {
                  router.push({name: 'Service', params: {id: res.data}})
                }
              })
        }

        if (this.selected.libelle === "Tâche ménagère") {
          this.addTacheMenagere.userToken = store.state.guid
          if(this.plusieurJoursBool){
            this.addTacheMenagere.dateEnd = this.dateEnd
          }
          else{
            this.addTacheMenagere.dateEnd = this.dateStart
          }
          this.addTacheMenagere.dateStart = this.dateStart
          this.addTacheMenagere.description = this.description
          this.addTacheMenagere.lieuAdresse = this.lieuAdresse
          this.addTacheMenagere.lieuCodePostal = this.lieuCodePostal
          this.addTacheMenagere.lieuVille = this.lieuVille
          this.addTacheMenagere.name = this.name
          this.addTacheMenagere.price = this.price

          axios.post('http://api.askhim.ctrempe.fr/service/create-tachemenagere-service', this.addTacheMenagere)
              .then((res) => {

                if (this.images) {
                  const arr = this.images.map(file => readFile(file)
                      .then(contenu => {
                            this.jsonImg.fileStr = contenu
                            axios.post(`http://api.askhim.ctrempe.fr/photo/save-photo-to-service?serviceId=${res.data}`, this.jsonImg)
                          }
                      ))
                  Promise.all(arr).then(() => {
                    console.log("L'ensemble des appels ajax sont terminés.")

                    router.push({name: 'Service', params: {id: res.data}})
                  })
                } else {
                  router.push({name: 'Service', params: {id: res.data}})
                }
              })
        }

      }


      e.preventDefault();

    }
    ,
    presenceOnClick() {
      if (this.presence === "Présentiel") {
        this.presence = "Distanciel"
      } else {
        this.presence = "Présentiel"
      }
    }
    ,
    presenceAnimalOnClick() {
      if (this.presenceAnimal === "Oui") {
        this.presenceAnimal = "Non"
      } else {
        this.presenceAnimal = "Oui"
      }
    },

    plusieursJoursOnClick() {
      if (this.plusieurJours === "Oui") {
        this.plusieurJours = "Non"
      } else {
        this.plusieurJours = "Oui"
      }
    },
    accompagnementOnClick() {
      if (this.accompagnement === "Oui") {
        this.accompagnement = "Non"
      } else {
        this.accompagnement = "Oui"
      }
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
    }
    ,
    debounceSearchPointArriver(event) {
      clearTimeout(this.debounce)

      this.debounce = setTimeout(() => {

        axios
            .get('https://api-adresse.data.gouv.fr/search/?q=' + event.target.value + '&type=housenumber&autocomplete=1')
            .then(response => (this.adressesPointArriver = response.data.features))
      }, 600)
    }
    ,
    debounceSearchPointDepart(event) {

      clearTimeout(this.debounce)

      this.debounce = setTimeout(() => {

        axios
            .get('https://api-adresse.data.gouv.fr/search/?q=' + event.target.value + '&type=housenumber&autocomplete=1')
            .then(response => (this.adressesPointDepart = response.data.features))
      }, 600)
    }
    ,
    select(value) {
      this.selectAdress = value
      this.adresses.forEach(adresse => {
        if (value === adresse.properties.label) {
          this.adressesDetail = adresse.properties
        }
      })
      this.adresses = []
    }
    ,
    selectPointArriver(value) {
      this.addTransport.pointArriver = value
      this.adressesPointArriver = []
    }
    ,
    selectPointDepart(value) {
      this.addTransport.pointDepart = value
      this.adressesPointDepart = []
    },
  },
  mounted() {
    axios
        .get('http://api.askhim.ctrempe.fr/type/get-types')
        .then(response => (this.types = response.data))
  }
}
</script>

<style scoped>

</style>
