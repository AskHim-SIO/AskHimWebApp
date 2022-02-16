<template>
  <div class="h-screen md:flex">
    <div class="flex md:w-1/2 bg-[url('http://cdn.askhim.ctrempe.fr/poigne.png')] bg-cover  i justify-around items-center">
      <div>
        <h1 class="text-white font-bold text-4xl font-sans">AskHim</h1>
        <p class="text-white mt-1">Vous souhaitez consulter vos services sur téléphone ?</p>
        <div class="pt-2">
          <button-white name="En savoir plus"></button-white>
        </div>
      </div>
    </div>
    <div class="flex w-1/2 justify-center items-center bg-white">
      <form class="bg-white" action="" method="POST" @submit="checkForm">
        <!--     todo csrf token-->
        <h1 class="text-gray-800 font-bold text-2xl mb-1">Vous êtes de retour ?</h1>
        <p class="text-sm font-normal text-gray-600 mb-7">Content de vous revoir !</p>

        <p v-if="errors.length">
        <ul>

          <li v-for="error in errors" :key="error">
            <span class="text-red-600">{{ error }}</span></li>
        </ul>

        <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
          </svg>
          <input class="pl-2 outline-none border-none" type="text" name="email" id="email" v-model="email"
                 placeholder="Adresse e-mail"/>
        </div>

        <!--      @error('password')-->
        <!--      <span class="text-red-600">{{ $message }}</span>-->
        <!--      @enderror-->
        <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
               fill="currentColor">
            <path fill-rule="evenodd"
                  d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                  clip-rule="evenodd"/>
          </svg>
          <div>
            <input class="pl-2 outline-none border-none" type="password" name="password" id="login_password" v-model="password"
                   placeholder="Mot de passe"/>
          </div>
          <div>
            <button class="pt-2 pl-2" type='button' value=""><span class='material-icons md-18'>visibility</span></button>
          </div>
        </div>
        <buttonBlue name="Se connecter"></buttonBlue>
        <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Mot de passe oublié ?</span>
      </form>
    </div>
  </div>
</template>

<script>
import ButtonWhite from "../components/buttonWhite";
import ButtonBlue from "../components/buttonBlue";
import axios from "axios";
import store from "../store";
import router from "../router";

export default {
  name: "Login",
  components: {ButtonWhite,ButtonBlue},


  data() {
    return {
      errors: [],
      email: "",
      password: "",
      form: {
        email: "",
        password: ""
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
      }
      // else if (this.password.length <= 5) {
      //   this.errors.push('Le mot de passe est trop court.');
      // }

      if (!this.errors.length) {
        this.form.email = this.email;
        this.form.password = this.password;

        axios.post('http://api.askhim.ctrempe.fr:80/auth/login', this.form)
            .then((res)=>{
              if(res.status === 200){
                store.commit("setGuid", res.data);
              }
            })
            .then(() => {
              router.push({ name: 'Profile'})
            })

        .catch(error => {
          if(error.response.status === 401){
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
