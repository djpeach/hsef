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
        <h2>Welcome to the Schools</h2>
   </v-title>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapState, mapActions } from 'vuex';

export default {
  name: 'Schools',
  data: () => ({

  }),
  computed: {
    ...mapState({
      schools: state => state.schools
    })
  },
  methods: {
    ...mapActions({
      getSchools: 'refreshSchools'
    })
  },
  mounted() {
    this.getSchools({
      limit: 10,
      offset: 0
    }).then(res => {
      console.log(res)
    }).catch(err => {
      console.log(err)
    })
  }
}
</script>