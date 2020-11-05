<template>
 <v-container>
    <v-row align="center"
      justify="space-around">
      <v-col>
        <p>Upload Student and Project Info</p>
      </v-col>
      <div id="app">
  <v-app id="inspire">
    <v-file-input
      accept="image/*"
      label="File input"
    ></v-file-input>
      
      <v-btn color="amber" depressed>
        Upload
      </v-btn>
  </v-app>
</div>
      
    </v-row>
  </v-container>   

</template>

<script>
export default {
  name: 'uploadCSV',
  el: '#app',
  data: () => ({
    // ...
  }),
}
</script>