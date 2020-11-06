<template>
  <v-container>
    <v-row>
      <v-col>
        <p>Welcome to the Grade Level</p>
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