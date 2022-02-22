<template>
  <!-- component -->
  <main class="my-2 ">
    <div class="container mx-auto px-6">
      <div class="flex h-screen antialiased text-gray-800">
        <div class="flex flex-row h-auto w-full overflow-x-hidden">
          <div class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white flex-shrink-0">
            <div class="flex flex-row items-center justify-center h-12 w-full">
              <div
                  class="flex items-center justify-center rounded-2xl text-indigo-700 bg-indigo-100 h-10 w-10"
              >
                <svg
                    class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                      d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                  ></path>
                </svg>
              </div>
              <div class="ml-2 font-bold text-2xl">ChatHim</div>
            </div>
            <div
                class="flex flex-col items-center bg-indigo-100 border border-gray-200 mt-4 w-full py-6 px-4 rounded-lg"
            >
              <div class="h-20 w-20 rounded-full border overflow-hidden">
                <img
                    v-if="profilePicture"
                    :src="profilePicture"
                    alt="Avatar"
                    class="h-full w-full"
                />
                <img
                    v-else
                    alt="Avatar"
                    class="h-full w-full"
                    src="http://cdn.askhim.ctrempe.fr/userPicture.png"
                />
              </div>
              <div class="text-sm font-semibold mt-2">{{ firstname }} {{ name }}</div>
            </div>
            <div class="flex flex-col mt-8">
              <div class="flex flex-row items-center justify-between text-xs">
                <span class="font-bold">Mes conversations</span>
                <span
                    class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full"
                >{{ utilisateurs.length }}</span
                >
              </div>
              <div class="flex flex-col space-y-1 mt-4 -mx-2 h-48 overflow-y-auto">
                <button v-for="utilisateur in utilisateurs" v-bind:key="utilisateur.uuid"
                        class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2"
                        v-on:click="loadChat(utilisateur)">
                  <div
                      class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full"
                  >
                    <img alt="user photo" class="w-8 h-8 rounded-full"
                         v-bind:src="utilisateur.User.profilPicture">
                  </div>
                  <div class="ml-2 text-sm font-semibold">{{ utilisateur.Service.name }}</div>
                  <div class="ml-2 text-xs font-semibold">{{ utilisateur.User.firstname }} {{
                      utilisateur.User.name
                    }}
                  </div>
                </button>
              </div>
              <div class="flex flex-row items-center justify-between text-xs mt-6">
                <span class="font-bold">Service plus disponibles</span>
                <span
                    class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full"
                >{{ archiveUtilisateurs.length }}</span
                >
              </div>
              <div class="flex flex-col space-y-1 mt-4 -mx-2 h-48 overflow-y-auto">
                <button v-for="archiveUtilisateur in archiveUtilisateurs" v-bind:key="archiveUtilisateur.uuid"
                        class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2"
                        v-on:click="loadChat(archiveUtilisateur)">
                  <!--                        v-on:click="loadChatArchive(archiveUtilisateur)"-->

                  <div
                      class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full"
                  >
                    <img alt="user photo" class="w-8 h-8 rounded-full"
                         v-bind:src="archiveUtilisateur.User.profilPicture">
                  </div>
                  <div class="ml-2 text-sm font-semibold">{{ archiveUtilisateur.Service.name }}</div>
                  <div class="ml-2 text-xs font-semibold">{{ archiveUtilisateur.User.firstname }} {{
                      archiveUtilisateur.User.name
                    }}
                  </div>
                </button>
              </div>
            </div>
          </div>

          <!-- MESSAGES -->

          <div class="flex flex-col flex-auto  p-20">

            <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 h-full ">
              <svg aria-hidden="true" class="absolute right-0 iconify iconify--ic" height="32"
                   preserveAspectRatio="xMidYMid meet" role="img" viewBox="0 0 24 24" width="32"
                   xmlns="http://www.w3.org/2000/svg"
                   xmlns:xlink="http://www.w3.org/1999/xlink">
                <path
                    d="M15.73 3H8.27L3 8.27v7.46L8.27 21h7.46L21 15.73V8.27L15.73 3zm.51 11.83l-1.41 1.41L12 13.41l-2.83 2.83l-1.41-1.41L10.59 12L7.76 9.17l1.41-1.41L12 10.59l2.83-2.83l1.41 1.41L13.41 12l2.83 2.83z"
                    fill="#ff0000"></path>
              </svg>
              <!-- profile picture-->
              <div v-if="this.lastChat != null" class="w-full px-4 flex justify-center pt-5">
                <div class="relative">
                  <img alt="..."
                       class="shadow-xl rounded-full h-auto align-middle border-none absolute -m-20 -ml-20 lg:-ml-16 max-w-100-px"
                       v-bind:src="lastChat.User.profilPicture">
                  <div class="ml-2 text-md font-semibold -mt-10 ml-10">{{ lastChat.User.firstname }}
                    {{ lastChat.User.name }}
                  </div>
                </div>

              </div>


              <!-- messages -->
              <div class="flex flex-col h-full overflow-x-auto mb-4 pt-5">
                <div class="flex flex-col  h-full">
                  <div v-for="message in messages" v-bind:key="message.id" class="grid grid-cols-12 gap-y-2">
                    <!-- messages reception -->
                    <div v-if="message.author.id !== id" class="col-start-1 col-end-8 p-3 rounded-lg">
                      <div class="flex flex-row items-center">
                        <div class="flex items-center justify-center h-10 w-10 rounded-full flex-shrink-0">
                          <img alt="user photo" class="w-8 h-8 rounded-full"
                               v-bind:src="message.author.profilPicture">
                        </div>
                        <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                          <div>{{ message.message }}</div>
                        </div>
                      </div>
                    </div>

                    <!-- messages envoyés -->
                    <div v-if="message.author.id === id" class="col-start-6 col-end-13 p-3 rounded-lg">
                      <div class="flex items-center justify-start flex-row-reverse">
                        <div class="flex items-center justify-center h-10 w-10 rounded-full flex-shrink-0">
                          <img alt="user photo" class="w-8 h-8 rounded-full"
                               v-bind:src="message.author.profilPicture">
                        </div>
                        <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                          <div>{{ message.message }}</div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
              <form
                  id="app"
                  action=""
                  method="post"
                  @submit="sendMessage"
              >
                <div
                    class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4"
                >

                  <div>
                    <button
                        class="flex items-center justify-center text-gray-400 hover:text-gray-600"
                    >
                      <svg
                          class="w-5 h-5"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        ></path>
                      </svg>
                    </button>
                  </div>

                  <div class="flex-grow ml-4">
                    <div class="relative w-full">

                      <input
                          v-model="writeMessage" :disabled="chatDisable"
                          class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10"
                          placeholder="Un problème ? Ask him !" type="text"
                      />
                    </div>
                  </div>
                  <div class="ml-4">
                    <button
                        :disabled="chatDisable"
                        class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 rounded-full text-white px-4 py-1 flex-shrink-0"
                        type="submit"
                    >
                      <span>Envoyer</span>
                      <span class="ml-2">
                      <svg
                          class="w-4 h-4 transform rotate-45 -mt-px"
                          fill="none"
                          stroke="currentColor"
                          viewBox="0 0 24 24"
                          xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                        ></path>
                      </svg>
                    </span>
                    </button>

                  </div>
                  <button v-if="estAuteur"
                          class="flex items-center justify-center bg-red-500 hover:bg-red-600 rounded-full text-white px-4 py-1 flex-shrink-0 ml-2"
                          v-on:click="finaliser()"
                  >
                    <span>Clôturer le service</span>
                    <span class="ml-2">
                    <svg
                        class="w-4 h-4 transform rotate-45 -mt-px"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                          d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                      ></path>
                    </svg>
                  </span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import store from "../store";
import axios from "axios";

export default {
  name: "Chat",
  data: function () {
    return {
      utilisateurs: [],
      archiveUtilisateurs: [],
      messages: [],
      id: 0,
      serviceId: 0,
      writeMessage: '',
      discussionToken: 0,
      chatDisable: true,
      loadUser: null,
      lastChat: null,
      estAuteur: false,
    }
  },
  methods: {
    finaliser() {
      axios.put(`http://api.askhim.ctrempe.fr:80/service/validate-service?serviceId=${this.lastChat.Service.id}&userId=${this.id}`)
          .then((res) => {
            if (res.data.success) {
              console.log("yoyo")
              clearInterval(store.state.interval)
              store.commit('unSetInterval')

              clearInterval(store.state.interval2)
              store.commit('unSetInterval2')

              this.messages = []
              this.chatDisable = true

              this.reloadConv()
            }
          })
    },
    loadChat(chat) {
      this.estAuteur = false;
      this.serviceId = chat.Service.id
      axios.get(`http://api.askhim.ctrempe.fr:80/service/get-services-from-user-by-token/${this.guid}`)
          .then(res => {
            res.data.forEach(service => {
              if (service.id === chat.Service.id) {
                this.estAuteur = true
              }
            })
          })

      if (store.state.interval)
        clearInterval(store.state.interval)

      axios.get(`http://api.askhim.ctrempe.fr:80/chat/get-discussion-by-id/${chat.Uuid}`)
          .then(res => {
            this.messages = res.data.messages
            this.discussionToken = res.data.uuid

            this.lastChat = chat
          })

      axios.put(`http://api.askhim.ctrempe.fr:80/chat/read-messages?discussionId=${chat.Uuid}&userToken=${this.guid}`)

      this.chatDisable = false

      const intervalName = setInterval(() => {
        axios.get(`http://api.askhim.ctrempe.fr:80/chat/get-discussion-by-id/${chat.Uuid}`)
            .then(res => {
              console.log(res)
              this.messages = res.data.messages
              this.discussionToken = res.data.uuid

              this.lastChat = chat
            })
      }, 1000);


      store.commit('setInterval', intervalName)

    },
    sendMessage(e) {
      if (this.discussionToken !== 0 && this.guid && this.writeMessage !== "") {
        axios.post(`http://api.askhim.ctrempe.fr:80/chat/post-message?discussionId=${this.discussionToken}&userToken=${this.guid}&message=${this.writeMessage}`)
            .then(res => {
              if (res.data.success) {
                this.loadChat(this.lastChat)
                this.writeMessage = ''
              }
            })
      }
      e.preventDefault();
    },


    reloadConv() {

      axios.get(`http://api.askhim.ctrempe.fr:80/user/get-user-by-token/${this.guid}`)
          .then(res => {
            this.id = res.data.id
            axios.get(`http://api.askhim.ctrempe.fr:80/chat/get-discussions-from-user-by-token/${this.guid}`)
                .then(res => {
                  this.utilisateurs = []
                  this.archiveUtilisateurs = []

                  res.data.forEach(discussion => {
                    if (discussion.service.state) {
                      discussion.users.forEach(user => {
                        if (user.id !== this.id) {
                          this.utilisateurs.push({
                            User: user,
                            Uuid: discussion.uuid,
                            Messages: discussion.messages,
                            Service: discussion.service
                          })
                        }
                      })
                    } else {
                      discussion.users.forEach(user => {
                        if (user.id !== this.id) {
                          this.archiveUtilisateurs.push({
                            User: user,
                            Uuid: discussion.uuid,
                            Messages: discussion.messages,
                            Service: discussion.service
                          })
                        }
                      })

                    }
                  })
                })
          })
      const interval2 = setInterval(() => {
        axios.get(`http://api.askhim.ctrempe.fr:80/user/get-user-by-token/${this.guid}`)
            .then(res => {
              this.id = res.data.id
              axios.get(`http://api.askhim.ctrempe.fr:80/chat/get-discussions-from-user-by-token/${this.guid}`)
                  .then(res => {
                    this.utilisateurs = []
                    this.archiveUtilisateurs = []
                    res.data.forEach(discussion => {
                      if (discussion.service.state) {
                        discussion.users.forEach(user => {
                          if (user.id !== this.id) {
                            this.utilisateurs.push({
                              User: user,
                              Uuid: discussion.uuid,
                              Messages: discussion.messages,
                              Service: discussion.service
                            })
                          }
                        })
                      } else {
                        discussion.users.forEach(user => {
                          if (user.id !== this.id) {
                            this.archiveUtilisateurs.push({
                              User: user,
                              Uuid: discussion.uuid,
                              Messages: discussion.messages,
                              Service: discussion.service
                            })
                          }
                        })

                      }
                    })
                  })
            })

      }, 10000);
      store.commit("setInterval2", interval2)
    }
  }
  ,
  mounted() {
    const token = this.$route.params.chatService
    axios.get(`http://api.askhim.ctrempe.fr:80/user/get-user-by-token/${this.guid}`)
        .then(res => {
          this.id = res.data.id

          axios.get(`http://api.askhim.ctrempe.fr:80/chat/get-discussions-from-user-by-token/${this.guid}`)
              .then(res => {
                res.data.forEach(discussion => {
                  if (discussion.service.state) {
                    discussion.users.forEach(user => {
                      if (user.id !== this.id) {
                        this.utilisateurs.push({
                          User: user,
                          Uuid: discussion.uuid,
                          Messages: discussion.messages,
                          Service: discussion.service
                        })
                      }
                    })
                  } else {
                    discussion.users.forEach(user => {
                      if (user.id !== this.id) {
                        this.archiveUtilisateurs.push({
                          User: user,
                          Uuid: discussion.uuid,
                          Messages: discussion.messages,
                          Service: discussion.service
                        })
                      }
                    })

                  }
                })
              })
              .then(() => {
                if (token != null || token != undefined) {
                  this.utilisateurs.forEach(chat => {
                    if (chat.Uuid === token) {
                      this.loadChat(chat)
                    }
                  })
                }
                this.reloadConv()
              })
        })
  }
  ,
  computed: {
    firstname() {
      return store.state.profile.firstname;
    }
    ,
    guid() {
      return store.state.guid;
    }
    ,
    name() {
      return store.state.profile.name;
    }
    ,
    profilePicture() {
      return store.state.profile.profilePicture;
    }
  }
  ,
}
</script>

<style scoped>

</style>
