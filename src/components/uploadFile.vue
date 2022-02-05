<template>
  <UploadImages
      @changed="handleImages"
      :max="5"
      maxError="Vous avez ateint le nombre de photos maximum"
      uploadMsg="Ajoutez vos images"
      fileError="Vous ne pouvez inserer que des images"
      clearAll="Supprimez toutes les images"



  />
</template>


<script>
import UploadImages from "vue-upload-drop-images"

export default {
  name: "uploadFile",
  components: {
    UploadImages,
  },
  methods:{
    handleImages(files){

      console.log(files)
      /*
        [
          {
              "name": "Screenshot from 2021-02-23 12-36-33.png",
              "size": 319775,
              "type": "image/png",
              "lastModified": 1614080193596
              ...
          },
          ...
          ]
       */
    }
  }
}


</script>

<style scoped>

</style>
