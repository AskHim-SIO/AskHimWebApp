import Vue from 'vue'
import Vuex from 'vuex'
import VuexPersist from 'vuex-persist';

Vue.use(Vuex)

const vuexLocalStorage = new VuexPersist({
    key: 'vuex',
    storage: window.localStorage,
})

export default new Vuex.Store({
    plugins: [vuexLocalStorage.plugin],

    state: {
        profile: {
            name: "",
            firstname: "",
            profilePicture: "",
            isAdmin: ""
        },
        guid: "",
    },

    mutations:
        {
            setGuid(state, value) {
                state.guid = value
            }
            ,
            login(state, values) {
                state.profile.name = values.name
                state.profile.firstname = values.firstname
                state.profile.profilePicture = values.profilePicture
                state.profile.isAdmin = values.isAdmin
            }
            ,
            logOut(state) {
                state.profile.name = '';
                state.guid = '';
                state.profile.firstname = '';
                state.profile.profilePicture = '';
                state.profile.isAdmin = '';
            }

        }
})
