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
        <h2>Grade Levels</h2>
   </v-title>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapState, mapActions } from 'vuex';

export default {
  name: 'GradeLevel',
  data: () => ({

  }),
  computed: {
    ...mapState({
      gradeLevels: state => state.gradeLevels
    })
  },
  methods: {
    ...mapActions({
      getGradeLevels: 'refreshGradeLevels'
    })
  },
  mounted() {
    this.getGradeLevels({
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