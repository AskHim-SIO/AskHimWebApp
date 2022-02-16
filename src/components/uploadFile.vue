<template>
  <div>
    <UploadImages
        :max="5"
        clearAll="Supprimez toutes les images"
        fileError="Vous ne pouvez inserer que des images"
        maxError="Vous avez ateint le nombre de photos maximum"
        uploadMsg="Ajoutez vos images"
        @changed="handleImages"></UploadImages>



  </div>

</template>


<script>
import UploadImages from "vue-upload-drop-images"

export default {
  name: "uploadFile",
  components: {
    UploadImages,
  },
  methods: {
    handleImages(files) {
      console.log(files)
      this.$emit('sendImages', {images: files})
    }
  }
}


</script>

<style scoped>

</style>
