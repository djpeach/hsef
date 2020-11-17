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
              v-for="session in judgeSchedule"
              :key="session.sessionId"
          >
            <v-row class="pt-1">
              <v-col cols="3">
                <strong>{{ session.startTime }}</strong>
              </v-col>
              <v-col>
                <strong>{{ session.projectName }}</strong>
                <div class="caption">
                  @Booth: #{{ session.boothNumber }}
                </div>
              </v-col>
              <v-col>
                <v-dialog
                    v-model="session.dialog"
                    max-width="300px"
                >
                  <template v-slot:activator="{on, attrs}">
                    <v-btn
                        v-on="on"
                        small
                        v-bind="attrs"
                    >
                      Enter Score
                    </v-btn>
                  </template>
                  <v-card>
                    <v-card-title>
                      <span class="headline">{{ session.projectName }}</span>
                    </v-card-title>
                    <v-card-text>
                      <v-container>
                        <v-row>
                          <v-col
                              cols="12"
                          >
                            <p>Enter a score between 0-100</p>
                            <v-text-field
                                label="Score"
                                color="amber"
                                v-model="session.currentScore"
                                required
                            ></v-text-field>
                          </v-col>

                        </v-row>
                      </v-container>
                    </v-card-text>
                    <v-card-actions>

                      <v-btn
                          text
                          @click="session.dialog = false"
                      >
                        CANCEL
                      </v-btn>
                      <v-spacer></v-spacer>
                      <v-btn
                          color="amber"
                          text
                          @click="saveCurrentScore(session.sessionId)"
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
import {mapState, mapActions} from 'vuex';

export default {
  name: 'JudgeSchedule',
  data: () => ({}),


  computed: {
    ...mapState({
      judgeSchedule: state => state.judgeSchedule
    })
  },

  methods: {
    saveCurrentScore(id) {
      const session = this.judgeSchedule.find(s => s.sessionId === id);
      this.saveScore({score: session.currentScore, id}).then(() => {
        session.dialog = false;
      })
    },
    ...mapActions({
      getJudgeSchedule: 'refreshJudgeSchedule',
      saveScore: 'saveScore',
    })
  },
  mounted() {
    this.getJudgeSchedule().catch(err => {
      console.log(err)
    })
  }
}
</script>
