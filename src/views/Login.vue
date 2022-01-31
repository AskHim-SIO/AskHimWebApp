<template>
  <div class="h-screen md:flex">
    <div class="flex md:w-1/2 bg-[url('assets/poigne.png')] bg-cover  i justify-around items-center">
      <div>
        <h1 class="text-white font-bold text-4xl font-sans">AskHim</h1>
        <p class="text-white mt-1">Vous souhaitez consulter vos services sur téléphone ?</p>
        <div class="pt-2">
          <button type="button"
                  class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus: font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2">
            En savoir plus
          </button>
        </div>

      </div>
    </div>
    <div class="flex w-1/2 justify-center items-center bg-white">
      <form class="bg-white" action="" method="POST">
<!--     todo csrf token-->
      <h1 class="text-gray-800 font-bold text-2xl mb-1">Vous êtes de retour ?</h1>
      <p class="text-sm font-normal text-gray-600 mb-7">Content de vous revoir !</p>

<!--      todo validator @error('email')-->
<!--      <span class="text-red-600">{{ $message }}</span>-->
<!--      @enderror-->
      <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
        </svg>
        <input class="pl-2 outline-none border-none" type="text" name="email" id=""
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
          <input class="pl-2 outline-none border-none" type="password" name="password" id="login_password"
                 placeholder="Mot de passe"/>
        </div>
        <div>
          <button class="pt-2 pl-2"  type='button' value=""><span class='material-icons md-18'>visibility</span></button>
        </div>
      </div>
        <div class="pt-2">
          <button type="submit"
                  class="text-white bg-askHimBlue hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Se connecter
          </button>
        </div>
        <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Mot de passe oublié ?</span>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  name: "Login"
}
</script>

<style scoped>

</style>
