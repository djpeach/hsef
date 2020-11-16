<template>
  <v-container>
    <v-row>
      <v-col>
        <h2>Welcome to the Judges</h2>
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
      getJudges: 'refreshJudges'
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