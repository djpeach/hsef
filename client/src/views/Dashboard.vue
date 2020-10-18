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
    axios.post('/create/admin/newUser', {
      user: {
        firstName: "Daniel",
        lastName: "Peach",
        suffix: "Sr",
        email: "danieles.pesacdhes@gmail.com",
        gender: "female",
        status: "archived",
        checkedIn: true,
      },
      operator: {
        title: "Dr.",
        highestDegree: "Masters",
        employer: "IU Health"
      }
    }).then(res => {
      console.log(res);
      this.fetching_status = res.data;
    }).catch(err => {
      console.log(err.response.data);
      this.fetching_status = err.response.data.message;
    });
  }
}
</script>
