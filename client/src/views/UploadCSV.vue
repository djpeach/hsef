<template>
 <v-container>
    <v-row align="center"
      justify="space-around">
      <v-col>
        <form @submit.prevent="filename = ''">
        <v-file-input
            color = "gray"
            accept="csv/*"
            label="File input"
            v-model="filename"
        ></v-file-input>
        </form>
      </v-col>
    </v-row>

    <v-row align="center"
      justify="space-around">
      <v-col>
        <!--<form method="get" action="client/src/assets/studentBulkUpload.xls">
          <v-btn type="submit">Sample CSV Download</v-btn>
        </form>
        <a href='client/src/assets/studentBulkUpload.xls' target="_blank">Download</a>-->
        <a style="text-decoration-line: none" :href="studentBulkUpload" download="studentBulkUpload.xls">
          <v-btn>Sample CSV Download</v-btn>
        </a>
          <!--<a style="text-decoration-line: none" href="client/src/assets/studentBulkUpload.xls" download>

          </a>-->
      </v-col>
      <v-spacer> </v-spacer>
      <v-col>
        <form action="uploadCSV.php" method="post">
          <v-btn color = "amber" style="float: right" class="submit" depressed>
            Upload
          </v-btn>
        </form>
      </v-col>
      
    </v-row>
  </v-container>   

</template>

<script>
//import temp from '../assets/temp.xlsx'
import studentBulkUpload from "@/assets/studentBulkUpload.xls";

export default {
  name: 'UploadCSV',
  data: () => ({
    filename: '',
    //studentBulkUploadLocation: studentBulkUpload
    studentBulkUpload
  }),
}
</script>