<template>
 <v-container>
    <v-row align="center"
      justify="space-around">
      <v-col>
        <v-file-input
            accept="csv/*"
            label="File input"
        ></v-file-input>
    <form action="import_file.php" method="post">
        <v-btn color="amber" id = "submit" depressed>
          Upload
        </v-btn>
      </form>
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