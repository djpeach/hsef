<template>
  <v-container>
    <v-row>
      <v-col class="text-center">
        <h1>Welcome to Dashboard</h1>
        <v-btn @click="showLinks = !showLinks" outlined color="amber">Show Presentation Links</v-btn>
      </v-col>
    </v-row>
    <v-row v-show="showLinks">
      <v-col>
        <h3>Judges</h3>
        <v-btn
            block
            elevation="2"
            to="/judge-registration"
        >
          Judge Registration (Public)
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/login"
        >
          Login (Public)
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/judge-schedule"
        >
          Judge Schedule & Scoring
        </v-btn>
      </v-col>
      <v-col>
        <h3>Admins</h3>
        <v-btn
            block
            elevation="2"
            to="/upload-csv"
        >
          CSV Student/Project Upload
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/students"
        >
          View/add/edit/delete Students
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/projects"
        >
          View/add/edit/delete Projects
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/schools"
        >
          View/add/edit/delete Schools
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/counties"
        >
          View/add/edit/delete Counties
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/judges"
        >
          View/add/edit/delete Sessions
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/categories"
        >
          View/add/edit/delete Categories
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/booths"
        >
          View/add/edit/delete Booths
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/judges"
        >
          View all judge information
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="event-management"
        >
          Run schedule builder
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/judges"
        >
          View new schedules
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/judges"
        >
          Edit Judge Session / See who has checked in
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/scores"
        >
          View all scores
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/final-scores"
        >
          View ranked scores
        </v-btn>
      </v-col>
      <v-col>
        <h3>Session Chairs</h3>
        <v-btn
            block
            elevation="2"
            to="/judges"
        >
          View all Judges
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/judges"
        >
          View all Sessions
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/booths"
        >
          View all Booths
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/projects"
        >
          View all Projects
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/scores"
        >
          View all Scores
        </v-btn>
        <v-btn
            block
            elevation="2"
            to="/final-scores"
        >
          View Average Ranking
        </v-btn>
      </v-col>
    </v-row>
    <v-row>
      <v-col lg="10" offset-lg="1">
        <v-card
          class="px-4 pb-3"
        >
          <v-card-title class="mb-5">Judging Preferences</v-card-title>
          <v-form @submit.prevent="savePreferencesHandler">
            <v-select
                v-model="projectsValue"
                :items="projects"
                chips
                label="Preferred Categories"
                multiple
                class="mb-8"
            ></v-select>
            <v-select
                v-model="gradeLevelValue"
                :items="gradeLevel"
                chips
                label="Preferred Grade Levels"
                multiple
            ></v-select>
            <div class="flex-row justify-end">
              <v-btn
                  color="amber"
                  type="submit"
                  :disabled="!canSavePreferences"
                  class="d-block mt-2 ml-auto"
              >
                Save Preferences
              </v-btn>
            </div>
          </v-form>
        </v-card>
      </v-col>
    </v-row>
    <v-row>
      <v-col md="6" lg="4" offset-lg="1">
        <v-card
          class="px-4 pb-3 text-center"
        >
          <v-card-title class="mb-5">Judge Check In and Out</v-card-title>
          <v-btn :color="checkedIn ? 'amber' : 'teal darken-4'" :class="checkedIn ? '' : 'white--text'" @click="checkedIn = !checkedIn">{{ checkedIn ? 'Check Out' : 'Check In' }}</v-btn>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>


export default {
  name: 'Dashboard',
  data: () => ({
    projects: ['Computer Science', 'Astrology', 'Physics', 'Geology','Forensics','Engineering'],
    projectsValue: ['Computer Science', 'Astrology', 'Physics', 'Geology','Forensics','Engineering'],
    gradeLevelValue: ['First','Second','Third','Fourth','Fifth','Sixth','Seventh','Eighth','Freshman','Sophomore','Junior','Senior'],
    gradeLevel: ['First','Second','Third','Fourth','Fifth','Sixth','Seventh','Eighth','Freshman','Sophomore','Junior','Senior'],
    canSavePreferences: false,
    checkedIn: false,
    showLinks: false,
  }),
  watch: {
    projectsValue() {
      this.canSavePreferences = true;
    },
    gradeLevelValue() {
      this.canSavePreferences = true;
    }
  },
  methods: {
    savePreferencesHandler() {
      this.canSavePreferences = false;
    }
  }
}
</script>
