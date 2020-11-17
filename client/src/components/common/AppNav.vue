<template>
  <div>
    <v-app-bar
        app
        color="teal darken-4"
        dark
    >
      <v-toolbar-title>HSEF System</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>
    </v-app-bar>
    <v-navigation-drawer
        color="teal darken-4"
        dark
        v-model="drawer"
        absolute
        temporary
        right
    >
      <v-list
          nav
          dense
      >
        <v-list-item-group
            v-model="group"
            active-class="teal darken-4"
            v-if="loggedIn"
        >
          <v-list-item to="/">
            <v-list-item-title>Dashboard</v-list-item-title>
          </v-list-item>
          <v-list-item to="admin-management">
            <v-list-item-title>Admin Management</v-list-item-title>
          </v-list-item>
          <v-list-item to="event-management">
            <v-list-item-title>Event Management</v-list-item-title>
          </v-list-item>
          <v-list-item to="judge-schedule">
            <v-list-item-title>Judge Schedule</v-list-item-title>
          </v-list-item>
          <v-list-item to="final-scores">
            <v-list-item-title>Final Scores</v-list-item-title>
          </v-list-item>
          <v-list-item to="upload-csv">
            <v-list-item-title>Upload Student Information</v-list-item-title>
          </v-list-item>
          <v-list-item @click="logout">
            <v-list-item-title>Logout</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
        <v-list-item-group v-else>
          <v-list-item to="/login">
            <v-list-item-title>Login</v-list-item-title>
          </v-list-item>
          <v-list-item to="/judge-registration">
            <v-list-item-title>Judge Registration</v-list-item-title>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
import { mapActions, mapState } from 'vuex'

export default {
  name: 'AppNav',

  data: () => ({
    drawer: false,
    group: null,
  }),
  computed: {
    ...mapState({
      loggedIn: state => state.isAuthenticated
    })
  },
  methods: {
    logout() {
      this.logoutStore().then(res => {
        window.sessionStorage.clear()
      }).catch(err => {
        console.log(err)
      }).finally(() => {
        this.$router.push({ name: 'login' })
      })
    },
    ...mapActions({
      logoutStore: 'logout'
    })
  }
};
</script>