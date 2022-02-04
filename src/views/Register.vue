<template>
  <div class="h-screen md:flex">
    <div class="flex md:w-1/2 bg-[url('http://cdn.askhim.ctrempe.fr/poigne.png')] bg-cover  i justify-around items-center">
      <div>
        <h1 class="text-white font-bold text-4xl font-sans">AskHim</h1>
        <p class="text-white mt-1">Vous souhaitez consulter vos services sur téléphone ?</p>
        <buttonWhite name="En savoir plus"></buttonWhite>
      </div>
    </div>
    <div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
      <form class="bg-white" method="POST" action="" @submit="checkForm">

        <h1 class="text-gray-800 font-bold text-2xl mb-1">Bienvenue !</h1>
        <p class="text-sm font-normal text-gray-600 mb-7">Vous souhaitez nous rejoindre ?</p>

        <p v-if="errors.length">
        <ul>

          <li v-for="error in errors" :key="error">
            <span class="text-red-600">{{ error }}</span></li>
        </ul>

        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
               fill="currentColor">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                  clip-rule="evenodd"/>
          </svg>
          <input class="pl-2 outline-none border-none" type="text" name="firstname" v-model="firstname"
                 placeholder="Prenom"/>
        </div>

        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/>
          </svg>
          <input class="pl-2 outline-none border-none" type="text" name="name" v-model="name" placeholder="Nom"/>
        </div>

        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
          </svg>
          <input class="pl-2 outline-none border-none" type="email" name="email" v-model="email" id="email"
                 placeholder="Email Address"/>
        </div>

        <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
               fill="currentColor">
            <path fill-rule="evenodd"
                  d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                  clip-rule="evenodd"/>
          </svg>
          <div>
            <input class="pl-2 outline-none border-none" type="password" name="password" v-model="password"
                   placeholder="Mot de passe"/>
          </div>
          <div>
            <button class="pt-2 pl-2" type='button' value=""><span
                class='material-icons md-18'>visibility</span></button>
          </div>
        </div>

        <div class="flex items-center border-2 py-2 mt-3 px-3 rounded-2xl">
          <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
              <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
              </svg>
            </div>

            <div class="relative">
<!--              <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">-->
<!--                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>-->
<!--              </div>-->
<!--              <input datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">-->
              <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                  <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>
                <input datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
              </div>
            </div>

          </div>
        </div>

        <buttonBlue name="S\'inscrire"></buttonBlue>
        <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Forgot Password ?</span>
      </form>
    </div>
  </div>
</template>

<script>
import ButtonWhite from "../components/buttonWhite";
import ButtonBlue from "../components/buttonBlue";
import axios from "axios";


export default {

  name: "Register",
  components: {ButtonWhite, ButtonBlue},
  data() {
    return {
      errors: [],
      email: "",
      checkin: '',
      firstname: "",
      name: "",
      password: "",
      dateNaiss: "",
      form: {
        dateNaiss: "",
        email: "",
        firstname: "",
        name: "",
        password: "",
      }
    }
  },
  methods: {
    checkForm: function (e) {
      this.errors = [];

      if (!this.email) {
        this.errors.push('L\'email est requis.');
      } else if (!this.validEmail(this.email)) {
        this.errors.push("Le mail n'est pas valide")
      }

      if (!this.password) {
        this.errors.push('Le mot de passe est requis.');
      } else if (this.password.length <= 5) {
        this.errors.push('Le mot de passe est trop court.');
      }

      if (!this.name) {
        this.errors.push('Le nom est requis.');
      }

      if (!this.firstname) {
        this.errors.push('Le prenom est requis.');
      }

      if (!this.dateNaiss) {
        this.errors.push('La date de naissance est requise.');
      }

      if (!this.errors.length) {
        this.form.dateNaiss = this.dateNaiss;
        this.form.email = this.email;
        this.form.firstname = this.firstname;
        this.form.name = this.name;
        this.form.password = this.password;

        axios.post('http://api.askhim.ctrempe.fr:80/user/create-user', this.form)
            .then((res) => {
              if (res.status === 201) {
                axios.post('http://api.askhim.ctrempe.fr:80/auth/login', this.form)
                    .then((res) => {
                      if (res.status === 200) {
                        localStorage.setItem('guid', res.data);
                        window.location.href = "/"
                      } else {
                        window.location.href = "se-connecter";
                      }
                    })
              }
            })
            .catch(error => {
              if (error.response.status === 401) {
                this.errors.push("L'email et le mot de passe ne correspondent pas")
              }
            })
      }

      e.preventDefault();
    },
    validEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }
  }
}
</script>

<style scoped>

</style>
