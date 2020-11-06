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
        <h2>Categories</h2>
   </v-title>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapState, mapActions } from 'vuex';

export default {
  name: 'Categories',
  data: () => ({

  }),
  computed: {
    ...mapState({
      categories: state => state.categories
    })
  },
  methods: {
    ...mapActions({
      getCategories: 'refreshCategories'
    })
  },
  mounted() {
    this.getCategories({
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