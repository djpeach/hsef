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
        <h2>Welcome to the Judges</h2>
   </v-title>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapState, mapActions } from 'vuex';

export default {
  name: 'Judges',
  data: () => ({

  }),
  computed: {
    ...mapState({
      judges: state => state.judges
    })
  },
  methods: {
    ...mapActions({
      getJudges: 'refreshActiveJudges'
    })
  },
  mounted() {
    this.getJudges({
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