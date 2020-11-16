<template>
  <v-container>
    <v-row>
      <v-col>
        <h2>Welcome to the Dashboard</h2>
        <v-btn
            block
            elevation="2"
        >
          button
        </v-btn>
        <v-btn
            block
            elevation="2"
        >
          button
        </v-btn>
        <v-btn
            block
            elevation="2"
        >
          button
        </v-btn>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Dashboard',
  data: () => ({}),
}
</script>
