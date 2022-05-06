import store from "../store";

export default ({next}) => {
    // Your custom if statement
    if (store.state.guid === "") {
        store.commit("logOut")
        next();
    } else {
        if (store.state.interval != "") {
            clearInterval(store.state.interval)
            store.commit("unSetInterval")
        }
        if (store.state.interval2 != "") {
            clearInterval(store.state.interval2)
            store.commit("unSetInterval2")
        }

        const guid = store.state.guid
        const urlTokenValid = 'http://192.168.50.11:4001/auth/token-valid?request=' + guid;
        const urlGetUser = 'http://192.168.50.11:4001/user/get-user-by-token/' + guid;

        fetch(urlTokenValid)
            .then(response => response.json())
            .then(repos => {
                if (repos.success) {
                    fetch(urlGetUser)
                        .then(response2 => response2.json())
                        .then(repos2 => {
                            if(repos2.id) {
                                store.commit('login', {
                                    firstname: repos2.firstname,
                                    name: repos2.name,
                                    profilePicture: repos2.profilPicture,
                                    isAdmin: repos2.admin,
                                })
                                next()
                            }
                            else{
                                console.log("else")
                                store.commit("logOut")
                                next({
                                    path: '/se-connecter',
                                    replace: true
                                })
                            }

                        })
                } else {
                    store.commit('logOut')
                    next({
                        path: '/se-connecter',
                        replace: true
                    })
                }

            })


    }
}
