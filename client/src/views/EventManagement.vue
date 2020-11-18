<template>
  <v-container>
    <v-row>
      <v-col class="text-center">
        <h1>Event Management Center</h1>
      </v-col>
    </v-row>
    <v-row>
      <v-col cols="12" md="4" sm="6">
        <!-- Card 1-->
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
            to="/judges"
        >
          <!-- Added Icon, needs to be centered-->
          <v-icon large color="amber">
            fas fa-gavel p-5
          </v-icon>
          <v-card-title class="amber--text">
            Judges
          </v-card-title>
        </v-card>
      </v-col>
      <!-- Card 2 -->
      <v-col cols="12" md="4" sm="6">
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
            to="/students"
        >
          <!-- Added Icon, needs to be centered-->
          <v-icon large color="amber">
            fas fa-user-graduate p-5
          </v-icon>
          <v-card-title class="amber--text">
            Students
          </v-card-title>
        </v-card>
      </v-col>
      <!-- Card 3 -->
      <v-col cols="12" md="4" sm="6">
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
            to="/projects"
        >
          <!-- Added Icon, needs to be centered-->
          <v-icon large color="amber">
            fas fa-microscope p-5
          </v-icon>
          <v-card-title class="amber--text">
            Projects
          </v-card-title>
        </v-card>
      </v-col>
    <!-- row 2-->
      <v-col cols="12" md="4" sm="6">
        <!-- Card 1-->
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
            to="/schools"
        >
          <!-- Added Icon, needs to be centered-->
          <v-icon large color="amber">
            fas fa-university p-5
          </v-icon>
          <v-card-title class="amber--text">
            Schools
          </v-card-title>
        </v-card>
      </v-col>
      <!-- Card 2 -->
      <v-col cols="12" md="4" sm="6">
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
            to="/categories"
        >
          <!-- Added Icon, needs to be centered-->
          <v-icon large color="amber">
            fas fa-stream p-55
          </v-icon>
          <v-card-title class="amber--text">
            Categories
          </v-card-title>
        </v-card>
      </v-col>
      <!-- Card 3 -->
      <v-col cols="12" md="4" sm="6">
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
            to="/scores"
        >
          <!-- Added Icon, needs to be centered-->
          <v-icon large color="amber">
            fas fa-award p-5
          </v-icon>
          <v-card-title class="amber--text">
            Scores
          </v-card-title>
        </v-card>
      </v-col>
    <!-- row 3-->
      <v-col cols="12" md="4" sm="6">
        <!-- Card 1-->
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
            to="/booths"
        >
          <!-- Added Icon, needs to be centered-->
          <v-icon large color="amber">
            fas fa-thumbtack p-5
          </v-icon>
          <v-card-title class="amber--text">
            Booths
          </v-card-title>
        </v-card>
      </v-col>
      <!-- Card 2 -->
      <v-col cols="12" md="4" sm="6">
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
            to="/counties"
        >
          <!-- Added Icon, needs to be centered-->
          <v-icon large color="amber">
            fas fa-map-marked-alt p-5
          </v-icon>
          <v-card-title class="amber--text">
            Counties
          </v-card-title>
        </v-card>
      </v-col>
      <!-- Card 3 -->
      <v-col cols="12" md="4" sm="6">
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
            to="/grade-levels"
        >
          <!-- Added Icon, needs to be centered-->
          <v-icon large color="amber">
            fas fa-users p-5
          </v-icon>
          <v-card-title class="amber--text">
            Grade Levels
          </v-card-title>
        </v-card>
      </v-col>
    </v-row>
    <v-spacer></v-spacer>
    <v-col>
      <v-row v-if="scheduleGenerationError">
        <v-col>
          <v-alert
              dense
              outlined
              type="error"
          >
            {{ scheduleGenerationError }}
          </v-alert>
        </v-col>
      </v-row>
      <v-row v-else-if="scheduleGenerationSuccess">
        <v-col>
          <v-alert
              dense
              outlined
              type="success"
          >
            {{ scheduleGenerationSuccess }}
          </v-alert>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-btn
            class="ma-2"
            x-large
            :loading="loading"
            :disabled="loading"
            color="amber"
            @click="generateSchedulesClicked"
        >
          Generate Judge Schedule
        </v-btn>
      </v-row>
    </v-col>
  </v-container>
</template>


<script>
import { mapActions } from 'vuex';

export default {
  name: 'EventManagement',
  data() {
    return {
      loading: false,
      scheduleGenerationSuccess: '',
      scheduleGenerationError: '',
    }
  },
  methods: {
    generateSchedulesClicked() {
      this.loading = true;
      this.generateSchedules().then(() => {
        this.scheduleGenerationError = '';
        this.scheduleGenerationSuccess = 'Judge schedules successfully generated. Go to the judge table to view each judge\'s schedule';
      }).catch(err => {
        this.scheduleGenerationSuccess = '';
        this.scheduleGenerationError = !!err.body ? err.body.message : ( !!err.message ? err.message : err);
      }).finally(() => {
        this.loading = false;
      })
    },
    ...mapActions({
      generateSchedules: 'generateSchedules'
    })
  }
}
</script>
