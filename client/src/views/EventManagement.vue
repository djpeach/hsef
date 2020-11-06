<template>
  <v-container>
    <v-col>
      <p>Welcome to the Event Management</p>
    </v-col>
    <v-row>
      <v-col>
        <!-- Card 1-->
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
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
      <v-col>
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
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
      <v-col>
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
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
    </v-row>
    <!-- row 2-->
    <v-row>
      <v-col>
        <!-- Card 1-->
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
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
      <v-col>
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
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
      <v-col>
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
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
    </v-row>
    <!-- row 3-->
    <v-row>
      <v-col>
        <!-- Card 1-->
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
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
      <v-col>
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
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
      <v-col>
        <v-card
            class="elevation-1 mt-3 col-12 col-sm-6 col-md-4"
            max-width="344"
            shaped
            color="teal darken-4"
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
      <v-row>
        <v-btn
            class="ma-2"
            :loading="loading"
            :disabled="loading"
            color="secondary"
            @click="loader = 'loading'"
        >
          Generate Judge Schedule
        </v-btn>
      </v-row>
    </v-col>
  </v-container>
</template>


<script>
export default {
  name: 'EventManagement',
  data: () => ({

  }),
}
</script>
