<template>
  <v-container>
    <v-row align="center"
           justify="space-around">
      <v-col>
        <v-file-input
            color="gray"
            accept="csv/*"
            label="Upload the CSV"
            v-model="file"
        ></v-file-input>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <a style="text-decoration-line: none" :href="studentBulkUpload" download="studentBulkUpload.xls">
          <v-btn>Sample CSV Download</v-btn>
        </a>
      </v-col>
      <v-col>
        <v-btn style="float: right" type="button" @click="uploadFile()" class="submit" color="amber" depressed>
          Upload
        </v-btn>
      </v-col>
    </v-row>
  </v-container>

</template>

<script>
import axios from 'axios'
import studentBulkUpload from "@/assets/studentBulkUpload.csv";

export default {
  name: 'UploadCSV',
  data: () => ({
    file: undefined,
    studentBulkUpload,
  }),
  methods: {
    uploadFile: function () {
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