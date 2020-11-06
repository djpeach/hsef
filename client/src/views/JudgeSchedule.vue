
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
                <strong>{{session.startTime}}</strong>
              </v-col>
              <v-col>
                <strong>{{session.projectName}}</strong>
                <div class="caption">
                  Booth: #{{session.booth}}
                </div>
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
                    small>
                      Enter Score
                    </v-btn>
                  </template>
                  <v-card>
                    <v-card-title>
                      <span class="headline">{{session.projectName}}</span>
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
                                v-model="score"
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
              </v-col>
            </v-row>
          </v-timeline-item>
        </v-timeline>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { mapState, mapActions } from 'vuex';

export default {
  name: 'JudgeSchedule',
  data: () => ({
      dialog: false,
      score: '',
      session: {
        projectName: 'Volcanoes!',
        booth: 25,
        startTime: '11:30am'
      }
  }),


  computed: {
    ...mapState({
      judgeSchedules: function(state) { return state.judgeSchedules; }
    })
  },

  methods: {
    ...mapActions({
      getJudgeSchedule: 'refreshJudgeSchedule'
    })
  },
  mounted() {
    this.getJudgeSchedule({
      limit: 10,
      offset: 0
    }).then(res => {
      console.log(res)
    }).catch(err => {
      console.log(err)
    })
  }
}
</script>
