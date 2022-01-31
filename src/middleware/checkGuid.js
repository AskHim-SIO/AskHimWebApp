export default ({next}) => {
    // Your custom if statement
    if (localStorage.getItem('guid') === null) {
        localStorage.clear()
        sessionStorage.clear()
        next();
    } else {
        const guid = localStorage.getItem('guid')
        const urlTokenValid = 'http://api.askhim.ctrempe.fr:80/auth/token-valid?request=' + guid;
        const urlGetUser = 'http://api.askhim.ctrempe.fr:80/user/get-user/' + guid;

        fetch(urlTokenValid)
            .then(response => response.json())
            .then(repos => {
                if (repos.success) {
                    if (sessionStorage.getItem('name') === null) {
                        fetch(urlGetUser)
                            .then(response2 => response2.json())
                            .then(repos2 => {
                                sessionStorage.setItem('firstname', repos2.firstname);
                                sessionStorage.setItem('name', repos2.name)
                                if (repos2.profilPicture !== null) {
                                    sessionStorage.profilPicture('profilPicture', repos2.profilPicture)
                                }
                                next()
                            })
                    }
                    else{
                        next()
                    }

                }
                else{
                    localStorage.clear()
                    sessionStorage.clear()
                    next({
                        path: '/se-connecter',
                        replace: true
                    })
                }

            })
            .catch(err => console.log(err))

    }
}
