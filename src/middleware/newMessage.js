import store from "../store";

import axios from "axios";

export default ({next}) => {
    if (store.state.guid) {
        setInterval(function () {
            axios.get(`http://192.168.50.11:4001/chat/check-new-messages-global?userToken=${store.state.guid}`)
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




