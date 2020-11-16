<template>
 <v-container>
    <v-row align="center"
      justify="space-around">
      <v-col>
        <v-file-input
            color = "gray"
            accept="csv/*"
            label="File input"
            id = "file"
            ref = "file"
            v-model="file"
            type = "file"
        ></v-file-input>
        <v-btn type="button" @click="uploadFile()" class="submit" depressed>
          Upload
        </v-btn>
      </v-col>
      
    </v-row>
  </v-container>   

</template>

<script>
export default {
  name: 'UploadCSV',
  data: () => {
    return { 
      file: this.file
    }
  },

  props: {
    file: {
        type: File
    },  
  },

  methods: {

     uploadFile: function(){

       this.file = this.$refs.file.files[0];

       let formData = new FormData();
       formData.append('file', this.file);

       axios.post('uploadCSV.php', formData,
       {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
       })
       .then(function (response) {

          if(!response.data){
             alert('File not uploaded.');
          }else{
             alert('File uploaded successfully.');
          }

       })
       .catch(function (error) {
           console.log(error);
       });

     }
   }
}
</script>