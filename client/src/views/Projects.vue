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
            <h2>Welcome to Projects</h2>
          </v-title>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapState, mapActions } from 'vuex';

export default {
  name: 'Projects',
  data: () => ({

  }),
  computed: {
    ...mapState({
      projects: state => state.projects
    })
  },
  methods: {
    ...mapActions({
      getProjects: 'refreshProjects'
    })
  },
  mounted() {
    this.getProjects({
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