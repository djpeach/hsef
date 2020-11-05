<template>
  <v-container>
    <v-row>
      <v-col>
        <v-timeline
            align-top
            dense
        >
          <v-timeline-item
              color="amber"
              small
          >
            <v-row class="pt-1">
              <v-col cols="3">
                <strong>5pm</strong>
              </v-col>
              <v-col>
                <v-dialog
                    v-model="dialog"
                    persistent
                    max-width="300px"
                    id="app"
                >
                  <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        v-bind="attrs"
                        v-on="on"
                    >
                      Session Number
                    </v-btn>
                  </template>
                  <v-card>
                    <v-card-title>
                      <span class="headline">Session #</span>
                    </v-card-title>
                    <v-card-text>
                      <v-container>
                        <v-row>
                          <v-col
                              cols="12"
                          >
                            <v-text-field
                                label="Score"
                                color="amber"
                                required
                            ></v-text-field>
                          </v-col>

                        </v-row>
                      </v-container>
                    </v-card-text>
                    <v-card-actions>

                      <v-btn
                          text
                          @click="dialog = false"
                      >
                        CANCEL
                      </v-btn>
                      <v-spacer></v-spacer>
                      <v-btn
                          color="amber"
                          text
                          @click="dialog = false"
                      >
                        Save
                      </v-btn>
                    </v-card-actions>
                  </v-card>
                </v-dialog>
                <div class="caption">
                  Booth Number
                </div>
              </v-col>
            </v-row>
          </v-timeline-item>
        </v-timeline>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
export default {
  name: 'JudgeSchedule',
  data: () => ({
      dialog: false,
  }),
}
</script>
