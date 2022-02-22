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
        msg: {
            newMsg: false,
            nbMsg : 0
        },
        interval : "",
        interval2 : ""
    },

    mutations:
        {
            setGuid(state, value) {
                state.guid = value
            },
            setInterval(state, value) {
                state.interval = value
            },
            unSetInterval(state) {
                state.interval = ''
            },
            setInterval2(state, value) {
                state.interval2 = value
            },
            unSetInterval2(state) {
                state.interval2 = ''
            },
            setNewMsg(state, value) {
                state.msg.newMsg = value
            },
            setNbMsg(state, value) {
                state.msg.nbMsg = value
            },
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
