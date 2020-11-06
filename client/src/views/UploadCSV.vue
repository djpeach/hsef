<template>
 <v-container>
    <v-row align="center"
      justify="space-around">
      <v-col>
        <v-file-input
            accept="image/*"
            label="File input"
        ></v-file-input>

        <v-btn color="amber" id = "submit" depressed>
          Upload
        </v-btn>
      </v-col>
      
    </v-row>
  </v-container>   

</template>

<script>
export default {
  name: 'UploadCSV',
  data: () => ({
    // ...
  }),
}
</script>