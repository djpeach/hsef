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
        <v-btn type="submit" color="amber" class="submit" depressed>
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
    filename: ''
  }),
}
</script>