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
    axios.get('/ping').then(res => {
      this.fetching_status = res.data;
    }).catch(err => {
      console.log(err);
      this.fetching_status = 'failed';
    })
  }
}
</script>