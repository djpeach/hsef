<template>
  <ul>
    <li
        v-for="student in students"
    >
      {{ student.user.firstName }}
    </li>
  </ul>
</template>

<script>
import {mapState, mapActions} from 'vuex';

export default {
  name: 'TempStudents',
  data: () => ({}),
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