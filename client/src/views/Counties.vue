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
            <h2>Counties</h2>
         </v-title>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapState, mapActions } from 'vuex';

export default {
  name: 'Counties',
  data: () => ({

  }),
  computed: {
    ...mapState({
      counties: state => state.counties
    })
  },
  methods: {
    ...mapActions({
      getCounties: 'refreshCounties'
    })
  },
  mounted() {
    this.getCounties({
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