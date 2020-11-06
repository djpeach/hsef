<template>
  <v-container>
    <v-row>
      <v-col>
        <p>Welcome to the Booths</p>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapState, mapActions } from 'vuex';

export default {
  name: 'Booths',
  data: () => ({

  }),
  computed: {
    ...mapState({
      booths: state => state.booths
    })
  },
  methods: {
    ...mapActions({
      getBooths: 'refreshBooths'
    })
  },
  mounted() {
    this.getBooths({
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