<template>
  <v-container>
    <v-row>
      <v-col>
       <v-title
          class="teal--text text--darken-4
                 font-weight-bold
                 text-center   
                 my-10 
                 ">
        <h2>Welcome to the Dashboard</h2>
   </v-title>
        <p>{{fetching_status}}</p>
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
