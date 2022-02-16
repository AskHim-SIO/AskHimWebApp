export const readFile = (file) => {
    return new Promise((resolve, reject) => {
        var fr = new FileReader();
        fr.onload = () => {
            resolve(fr.result )
        };
        fr.onerror = reject;
        fr.readAsDataURL(file);
    });
}
