<template>
   <v-container>
    <v-row align="center"
      justify="space-around">
      <v-col>
        <form @submit.prevent="submitLogin">
          <p>Username</p>
          <v-text-field
              label="Enter Username"
              v-model="creds.email"
              type="email"
          ></v-text-field>
          <p>Password</p>
          <v-text-field
              label="Enter Password"
              v-model="creds.password"
              type="password"
          ></v-text-field>
          <v-btn type="submit" color="amber" depressed>
            Log In
          </v-btn>
        </form>
      </v-col>
    </v-row>
  </v-container>  

</template>

<script>
import { mapActions } from 'vuex';

const myObj = { firstName: 'Ashley' }

export default {
  name: 'LogIn',
  data: () => ({
    creds: {
      email: '',
      password: '',
      username: 'test',
    },
    err: null,
  }),
  methods: {
    submitLogin() {
      // form validation
        // check that email is actually an email
      // send credentials to api
      this.loginUser({ ...this.creds })
      .then(async () => {
        await this.$router.push({name: 'dashboard'})
      }).catch(err => {
        this.err = err;
      })
    },
    ...mapActions({
      loginUser: 'login'
    })
  }
}
</script>