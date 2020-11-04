<template>
  <v-container>
    <v-row>
      <v-col>
        <p>Welcome to the Judge Schedule</p>
      </v-col>
    </v-row>
  </v-container>

  <div id="app">
    <v-app id="inspire">
      <v-card
          class="mx-auto"
          max-width="400"
      >
        <v-card
            dark
            flat
        >

          <v-card-title class="pa-2 teal darken-4">
            <v-btn icon>
              <v-icon>mdi-menu</v-icon>
            </v-btn>
            <h3 class="title font-weight-light text-center grow">
              Judge Schedule
            </h3>

          </v-card-title>
          <v-img
              src="https://cdn.vuetifyjs.com/images/cards/forest.jpg"
              gradient="to top, rgba(0,0,0,.44), rgba(0,0,0,.44)"
          >
            <v-container class="fill-height">
              <v-row align="center">
                <strong class="display-4 font-weight-regular mr-6">8</strong>
                <v-row justify="end">
                  <div class="headline font-weight-light">
                    Monday
                  </div>
                  <div class="text-uppercase font-weight-light">
                    February 2015
                  </div>
                </v-row>
              </v-row>
            </v-container>
          </v-img>
        </v-card>
        <v-card-text class="py-0">
          <v-timeline
              align-top
              dense
          >

            <!-- BASIC TIMELINE ITEM  -->
            <v-timeline-item
                color="amber"
                small
            >
              <v-row class="pt-1">
                <v-col cols="3">
                  <strong>5pm</strong>
                </v-col>
                <v-col>
                  <v-btn>
                    <strong>Session Number</strong>
                  </v-btn>
                  <div class="caption">
                    Booth Number
                  </div>
                </v-col>
              </v-row>
            </v-timeline-item>
            <!-- BASIC TIMELINE ITEM END -->


          </v-timeline>
        </v-card-text>
      </v-card>
    </v-app>
  </div>
</template>

<script>
export default {
  name: 'JudgeSchedule',
  data: () => ({
    // ...
  }),
}
</script>
