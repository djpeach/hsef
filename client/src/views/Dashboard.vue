<template>
  <v-container>
    <v-row>
      <v-col>
        <h2>Welcome to the Dashboard</h2>
        <v-btn
            block
            elevation="2"
        >
          CSV file upload
        </v-btn>
        <v-btn
            block
            elevation="2"
        >
          judge information
        </v-btn>
        <v-btn
            block
            elevation="2"
        >
          schedule builder
        </v-btn>

      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <a :href="temp" download="temp.xlsx">Download</a>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import temp from '../assets/temp.xlsx'

export default {
  name: 'Dashboard',
  data: () => ({
    temp
  }),
}
</script>
