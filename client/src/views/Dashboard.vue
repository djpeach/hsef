<template>
  <div class="home">
    <p>Welcome to the dashboard!</p>
    <p>{{fetching_status}}</p>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'Dashboard',
  data() {
    return {
      fetching_status: ""
    }
  },
  created() {
    axios.get(`/list/admin?limit=${2}&offset=${4}`)
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
