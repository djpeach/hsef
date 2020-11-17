<template>
  <v-container>
    <v-row v-if="err">
      <v-col>
        <v-alert
            dense
            outlined
            type="error"
        >
          {{ err.body.message }}
        </v-alert>
      </v-col>
    </v-row>
    <v-row align="center"
           justify="space-around">
      <v-col>
        <form @submit.prevent="submitPwdResetClicked">
          <p>New Password</p>
          <v-text-field
              label="Enter Password"
              v-model="password"
              type="password"
          ></v-text-field>
          <p>Password Confirmation</p>
          <v-text-field
              label="Enter Password Again"
              v-model="passwordConfirmation"
              type="password"
          ></v-text-field>
          <v-btn type="submit" color="amber" depressed>
            Submit Reset
          </v-btn>
        </form>
      </v-col>
    </v-row>
  </v-container>

</template>

<script>
import { mapActions } from 'vuex';

export default {
  name: 'LogIn',
  data: () => ({
    password: '',
    passwordConfirmation: '',
    err: null,
  }),
  methods: {
    submitPwdResetClicked() {
      if (this.password !== this.passwordConfirmation) {
        this.err = {
          body: { message: 'Passwords do not match' }
        }
        return
      }
      this.resetPasswordSubmit({ key: this.$route.query.k, pwd: this.password }).then(() => {
        this.$router.push({name: 'login'})
      }).catch(err => {
        this.err = err;
      })
    },
    ...mapActions({
      resetPasswordSubmit: 'resetPwdSubmit'
    })
  }
}
</script>