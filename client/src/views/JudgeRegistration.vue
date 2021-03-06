<template>
  <v-container class="pa-5">
    <v-row>
      <v-col class="text-center">
        <h1>Public Judge Registration</h1>
      </v-col>
    </v-row>
    <v-row v-if="registrationError">
      <v-col>
        <v-alert
            dense
            outlined
            type="error"
        >
          {{ registrationError }}
        </v-alert>
      </v-col>
    </v-row>
    <v-row v-else-if="registrationSuccess">
      <v-col>
        <v-alert
            dense
            outlined
            type="success"
        >
          {{ registrationSuccess }}
        </v-alert>
      </v-col>
    </v-row>
    <v-row justify="center">
      <v-col cols="12" md="8">
        <v-form
            ref="form"
            lazy-validation
            @submit.prevent="submitForm"
        >
          <v-row>
            <v-col
                cols="12"
                md="6"
            >
              <v-text-field
                  v-model="form.firstName"
                  label="First name"
                  required
              ></v-text-field>
            </v-col>
            <v-col
                cols="12"
                md="6"
            >
              <v-text-field
                  v-model="form.lastName"
                  label="Last name"
                  required
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row align="center">
            <v-col
                class="d-flex"
                cols="12"
                sm="6"
            >
              <v-select
                  :items="titles"
                  v-model="form.title"
                  label="Title"
              ></v-select>
            </v-col>
            <v-col
                class="d-flex"
                cols="12"
                sm="6"
            >
              <v-select
                  :items="degrees"
                  v-model="form.highestDegree"
                  label="Highest Degree Earned"
              ></v-select>
            </v-col>
          </v-row>
          <v-row align="center">
            <v-col
                class="d-flex"
                cols="12"
                sm="6"
            >
              <v-select
                  :items="genders"
                  v-model="form.gender"
                  label="Gender"
              ></v-select>
            </v-col>
            <v-col
                class="d-flex"
                cols="12"
                sm="6"
            >
              <v-text-field
                  v-model="form.employer"
                  label="Employer"
              ></v-text-field>
            </v-col>
          </v-row>
          <v-row>
            <v-col
                cols="12"
            >
              <v-text-field
                  v-model="form.email"
                  label="E-mail"
              ></v-text-field>
            </v-col>
            <v-col>
              <v-btn
                  style="float:right"
                  color="amber"
                  class="mr-4"
                  type="submit"
              >
                Submit
              </v-btn>
            </v-col>
          </v-row>
        </v-form>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapActions } from 'vuex'

export default {
  name: "JudgeRegistration",
  data: () => ({
    titles: ['Mr.', 'Mrs.', 'Miss', 'Dr.'],
    genders: ['male', 'female', 'other'],
    degrees: ['High School Diploma', 'Some College', 'Associates Degree', 'Bachelors Degree', 'Masters', 'PhD'],
    form: {
      firstName: '',
      lastName: '',
      title: '',
      gender: '',
      employer: '',
      highestDegree: '',
      email: '',
    },
    registrationSuccess: '',
    registrationError: '',
  }),
  methods: {
    submitForm() {
      const { firstName, lastName, title, highestDegree, email, gender, employer } = this.form;
      this.registerJudge({ firstName, lastName, title, highestDegree, email, gender, employer }).then(() => {
        this.registrationError = '';
        this.registrationSuccess = 'You have been registered. When an admin approves you, you will be sent an email with instructions to set your password as well as your category and grade level judging preferences'
        for (const key in this.form) {
          this.form[key] = '';
        }
      }).catch(err => {
        this.registrationSuccess = '';
        this.registrationError = !!err.body ? err.body.message : ( !!err.message ? err.message : err);
      })
    },
    ...mapActions({
      registerJudge: 'registerJudge'
    })
  },
}

</script>