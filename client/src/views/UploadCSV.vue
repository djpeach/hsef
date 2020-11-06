<template>
 <v-container>
    <v-row align="center"
      justify="space-around">
      <v-col>
        <v-file-input
            color = "gray"
            accept="csv/*"
            label="File input"
        ></v-file-input>
      <form action="uploadCSV.php" method="post">
        <v-btn color="amber" class="submit" depressed>
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