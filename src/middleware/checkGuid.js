import store from "../store";

export default ({next}) => {
    // Your custom if statement
    if (store.state.guid === "") {
        store.commit("logOut")
        next();
    } else {
        const guid = store.state.guid
        const urlTokenValid = 'http://api.askhim.ctrempe.fr:80/auth/token-valid?request=' + guid;
        const urlGetUser = 'http://api.askhim.ctrempe.fr:80/user/get-user/' + guid;

        fetch(urlTokenValid)
            .then(response => response.json())
            .then(repos => {
                if (repos.success) {
                    if (store.state.profile.name === "") {
                        fetch(urlGetUser)
                            .then(response2 => response2.json())
                            .then(repos2 => {
                                store.commit('login', {
                                    firstname: repos2.firstname,
                                    name: repos2.name,
                                    profilePicture: repos2.profilPicture,
                                })
                                next()
                            })
                    }
                    else{
                        next()
                    }

                } else {
                    store.commit('logOut')
                    next({
                        path: '/se-connecter',
                        replace: true
                    })
                }

            })
            .catch(err => console.log(err))

    }
}
