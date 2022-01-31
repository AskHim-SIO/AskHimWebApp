export default ({ next }) => {
    // Your custom if statement
    if ( localStorage.getItem('guid') === null){
        next();
    } else {
        next({
            path: '/',
            replace: true
        })
    }
}
