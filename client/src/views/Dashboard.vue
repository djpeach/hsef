<template>
  <v-container>
    <v-row>
      <v-col>
        <p>Welcome to the dashboard!</p>
        <p>{{fetching_status}}</p>
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
