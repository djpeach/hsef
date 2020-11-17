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
        <form @submit.prevent="submitLogin">
          <p>Email</p>
          <v-text-field
              label="Enter Email"
              v-model="creds.email"
              type="email"
          ></v-text-field>
          <p>Password</p>
          <v-text-field
              label="Enter Password"
              v-model="creds.password"
              type="password"
          ></v-text-field>
          <v-dialog
            max-width="400"
            v-model="pwdResetDialog"
          >
            <template v-slot:activator="{on, attrs}">
              <div>
                <p style="display: inline">Don't know or forgot your password?</p>
                <v-btn
                    text
                    v-on="on"
                    v-bind="attrs"
                  color="primary"
                >Reset Password</v-btn>
              </div>
            </template>
            <v-card>
              <v-card-title class="headline grey lighten-2">
                Password Reset
              </v-card-title>

              <v-divider></v-divider>

              <v-container>
                <v-row v-if="pwdResetErr">
                  <v-col>
                    <v-alert
                        dense
                        outlined
                        type="error"
                    >
                      {{ pwdResetErr.body.message }}
                    </v-alert>
                  </v-col>
                </v-row>
                <v-row v-if="pwdResetSucc">
                  <v-col>
                    <v-alert
                        dense
                        outlined
                        type="success"
                    >
                      {{ pwdResetSucc }}
                    </v-alert>
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    <v-text-field
                        label="Enter Email"
                        v-model="pwdResetEmail"
                        type="email"
                    ></v-text-field>
                  </v-col>
                </v-row>
              </v-container>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn
                    color="primary"
                    text
                    @click="resetPwdClicked"
                >
                  Submit
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
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

export default {
  name: 'LogIn',
  data: () => ({
    creds: {
      email: '',
      password: '',
    },
    pwdResetEmail: '',
    pwdResetDialog: false,
    pwdResetErr: null,
    pwdResetSucc: null,
    err: null,
  }),
  watch: {
    pwdResetDialog(newValue) {
      if (newValue === false) {
        this.pwdResetSucc = null;
        this.pwdResetErr = null;
        this.pwdResetEmail = '';
      }
    }
  },
  methods: {
    resetPwdClicked() {
      this.resetPassword({ email: this.pwdResetEmail }).then(() => {
        this.pwdResetErr = null;
        this.pwdResetSucc = `Password reset email sent to ${this.pwdResetEmail}`;
      }).catch(err => {
        this.pwdResetSucc = null;
        this.pwdResetErr = err;
      })
    },
    submitLogin() {
      // TODO: form validation
      this.loginUser({ ...this.creds })
      .then(async () => {
        await this.$router.push({name: 'dashboard'})
      }).catch(err => {
        this.err = err;
      })
    },
    ...mapActions({
      loginUser: 'login',
      resetPassword: 'resetPwd'
    })
  }
}
</script>