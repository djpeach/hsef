<template>
  <!--<div id="app">-->
  <v-app id="inspire">
    <v-form
        ref="form"
        v-model="valid"
        lazy-validation
    >
      <v-container
          style="width:50%"
      >
        <v-row>
          <v-col
              cols="12"
              md="4"
          >
            <v-text-field
                v-model="firstname"
                :rules="nameRules"
                label="First name"
                required
            ></v-text-field>
          </v-col>

          <v-col
              cols="12"
              md="4"
          >
            <v-text-field
                v-model="middlename"
                :rules="nameRules"
                label="Middle name"

            ></v-text-field>
          </v-col>

          <v-col
              cols="12"
              md="4"
          >
            <v-text-field
                v-model="lastname"
                :rules="nameRules"
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
                :items="title"
                label="Title"
            ></v-select>
          </v-col>
          <v-col
              class="d-flex"
              cols="12"
              sm="6"
          >
            <v-select
                :items="degree"
                label="Highest Degree Earned"
            ></v-select>
          </v-col>

        </v-row>
        <v-row>
          <v-col

          >
            <v-text-field
                v-model="email"
                :rules="emailRules"
                label="E-mail"
                required
            ></v-text-field>
          </v-col>

          <v-col

          >
            <v-btn
                style="float:right"
                :disabled="!valid"
                color="amber"
                class="mr-4"
                @click="validate"
                type="submit"

            >
              Submit
            </v-btn>
          </v-col>
        </v-row>

      </v-container>


    </v-form>
  </v-app>
  <!--</div>-->
</template>

<script>
export default {
  name: "JudgeRegistration",
  data: () => ({
    title: ['Mr.', 'Mrs.', 'Miss', 'Dr.'],
    degree: ['High School Diploma', 'Some College', 'Associates Degree', 'Bachelors Degree', 'Masters', 'PhD'],
    valid: false,
    firstname: '',
    middlename: '',
    lastname: '',
    nameRules: [
      v => !!v || 'Name is required',
      v => v.length <= 20 || 'Name must be less than 20 characters',
    ],
    email: '',
    emailRules: [
      v => !!v || 'E-mail is required',
      v => /.+@.+/.test(v) || 'E-mail must be valid',
    ],

  }),
  methods: {
    validate() {
      this.$refs.form.validate()
    },
  },
}

</script>

<style scoped>

</style>