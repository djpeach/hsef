<template>
    <v-container>
    <v-row>
      <v-col>
        <p>Upload Student and Project Information</p>
      </v-col>
      <div id="app">
  <v-app id="inspire">
    <v-file-input
      accept="image/*"
      label="File input"
    ></v-file-input>
    <v-row
      align="center"
      justify="space-around"
    >
      <v-row>
      <v-btn color="amber" depressed>
        Upload
      </v-btn>
       </v-row>
    </v-row>
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