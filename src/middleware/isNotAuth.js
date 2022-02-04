import store from "../store";

export default ({ next }) => {
    // Your custom if statement
    if (store.state.guid !== ""){
        next();
    } else {
        next({
            path: '/se-connecter',
            replace: true
        })
    }
}
