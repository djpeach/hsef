<template>
  <v-container>


        <h2
            align="center">
          Welcome to the Dashboard
        </h2>
    <v-row>
      <v-col
          align="center">
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
      <v-col
          align="center">
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
      <v-col
          align="center">
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
        <v-col
            align="center">
          <h4>Judging Preferences</h4>
          <v-form>

            <v-select
                v-model="projectsValue"
                :items="projects"
                chips
                label="Project categories I prefer to judge:"
                multiple
                outlined
            ></v-select>
            <v-select
                v-model="gradeLevelValue"
                :items="gradeLevel"
                chips
                label="Grade levels I prefer to judge:"
                multiple
                outlined
            ></v-select>
            <v-btn
              color="amber"
              type="submit">
              Submit Preferences
            </v-btn>
          </v-form>
        </v-col>
        <v-col
          align="center">
          <h4>Judge Check-in</h4>
          <v-checkbox
              v-model="checkbox"
              :label="`Checked In: ${checkbox.toString()}`"
          ></v-checkbox>
        </v-col>
      </v-row>
  </v-container>
</template>

<script>


export default {
  name: 'Dashboard',
  data: () => ({
    checkbox: false,
    projects: ['Computer Science', 'Astrology', 'Physics', 'Geology','Forensics','Engineering'],
    projectsValue: ['Computer Science', 'Astrology', 'Physics', 'Geology','Forensics','Engineering'],
    gradeLevelValue: ['First','Second','Third','Fourth','Fifth','Sixth','Seventh','Eighth','Freshman','Sophomore','Junior','Senior'],
    gradeLevel: ['First','Second','Third','Fourth','Fifth','Sixth','Seventh','Eighth','Freshman','Sophomore','Junior','Senior'],
  }),
}
</script>
