<template>
  <div class="bg-white">
    <header>
      <div class="container mx-auto px-6 py-3">
        <div class="relative mt-6 max-w-lg mx-auto">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"/>
                            </svg>
                        </span>
          <input
              class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-askHim-blue focus:outline-none focus:shadow-outline"
              type="text" placeholder="Recherche">
        </div>
      </div>
      <select v-model="newsType" @change="changeType">
        <!-- Type options -->
      </select>
    </header>
    <main class="my-8">
      <div class="container mx-auto p-6">
        <div class="flex flex-wrap justify-center">

          <div v-for="test in list" v-bind:key="test.id" class="p-4 rounded-xl hover:scale-105 duration-500 transform transition cursor-pointer">
            <!-- Tag Discount -->
            <div
                class="top-0 left-0 mt-3 px-2 rounded-lg absolute z-30 bg-green-500 text-gray-100 text-xs md:text-sm font-medium md:block">
              <p>lib</p>
            </div>
            <div class="top-0 left-0 h-2 md:h-3 mt-5 px-2 absolute z-20 bg-green-500"></div>
            <div class="top-0 left-0 h-2 md:h-3 mt-6 pl-5 rounded-3xl absolute z-0 bg-green-600"></div>
            <div class="w-52 pb-2 bg-white rounded-xl shadow-xl z-10">
              <div class="relative">
                <!-- :src="image.largeImageURL"     -->
                <img src="https://docs.microsoft.com/fr-fr/windows-server/storage/dfs-namespaces/media/dfs-overview.png"
                     class="max-h-60 object-cover rounded-t-xl" alt="">
                <!-- Tag rekomendasi -->
                <!--                                                            <div class="bottom-0 right-0 mb-2 mr-2 px-2 rounded-lg absolute bg-yellow-500 text-gray-100 text-xs font-medium">Pour vous</div>-->
              </div>
              <div class="px-2 py-1">
                <!-- Product Title -->
                <div class="text-sm md:text-base font-bold pr-2">{{ test.name }}</div>
                <div class="flex py-2">
                  <!-- Distance -->
                  <div class="bg-gray-200 p-1 mr-2 rounded-lg text-xs font-medium text-gray-900">
                    ville
                  </div>
                  <div class="flex justify-between item-center">
                    <div class="flex items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                           stroke="#9b9b9b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="1" x2="12" y2="23"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                      </svg>
                      <!-- Rating total -->
                      <p class="text-gray-600 font-bold text-xs md:text-sm ml-1">
                        {{test.price}}
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
                  <a class="inset-x-0 bottom-0 flex justify-center bg-blue-500 hover:bg-white text-sm md:text-base border hover:border-2 hover:border-blue-500 rounded-xl w-14 md:w-16 p-1 text-gray-100 hover:text-blue-900"
                     href="#">Voir</a>
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

export default {
  name: "Research",
  data() {
    return {
      page: 1,
      list: [],
      newsType: 'story',
      infiniteId: +new Date(),

    };
  },
}
</script>

<style scoped>

</style>
