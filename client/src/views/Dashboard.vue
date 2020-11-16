<template>
  <v-container>
    <v-row>
      <v-col>
        <h2>Welcome to the Dashboard</h2>
        <p>{{fetching_status}}</p>
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
  data: () => ({
      fetching_status: "",
  }),
  created() {
    axios.get(`/list/admins`)
    .then(res => {
      console.log(res);
      this.fetching_status = res.data;
    }).catch(err => {
      console.log(err.response.data);
      this.fetching_status = err.response.data;
    });
  }
}
</script>
