<template>
  <v-container>
    <v-row>
      <v-col>
        <p>Welcome to the Categories</p>
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