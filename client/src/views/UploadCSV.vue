<template>
 <v-container>
    <v-row align="center"
      justify="space-around">
      <v-col>
        <v-file-input
            color = "gray"
            accept="csv/*"
            label="Upload the CSV"
            v-model="file"
        ></v-file-input>
        <v-btn type="button" @click="uploadFile()" class="submit" depressed>
          Upload
        </v-btn>
      </v-col>
    </v-row>
  </v-container>   

</template>

<script>
import axios from 'axios'

export default {
  name: 'UploadCSV',
  data: () => ({
    file: undefined
  }),
  methods: {
     uploadFile: function(){
       console.log(this.file)
       const formData = new FormData();
       formData.append('csv', this.file);
       axios.post('/create/studentBulk', formData, {
         headers: {
           'Content-Type': 'multipart/form-data'
         }
       }).then(res => {
         console.log(res)
       }).catch(err => {
         console.log(err)
       })
     }
   }
}
</script>