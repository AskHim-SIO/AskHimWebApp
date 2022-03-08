import store from "../store";

import axios from "axios";

export default ({next}) => {
    if (store.state.guid) {
        setInterval(function () {
            axios.get(`https://api.askhim.ctrempe.fr/chat/check-new-messages-global?userToken=${store.state.guid}`)
                .then(res => {
                    if (res.data.success) {
                        store.commit("setNewMsg", true)
                        store.commit("setNbMsg", res.data.message.replace(" messages non lus", ""))
                    } else {
                        store.commit("setNewMsg", false)
                    }
                })
        }, 5000);
    }
    next();
}




