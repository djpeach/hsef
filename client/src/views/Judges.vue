<template>
  <v-container>
    <v-row v-if="err">
      <v-col>
        <v-alert
            dense
            outlined
            type="error"
        >
          {{ err.body.message }}
        </v-alert>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <v-data-table
            :headers="headers"
            :items="judges"
            show-expand
            item-key="email"
            :loading="loading"
            :mobile-breakpoint="0"
            class="elevation-1 my-8"
            loading-text="Fetching Judges"
            no-data-text="No Judges to show"
            :footer-props="{itemsPerPageOptions: [10, 25, 50]}"
        >
          <template v-slot:top>
            <v-toolbar flat>
              <v-toolbar-title>Active Judges</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-dialog v-model="formDialog" max-width="500px">
                <template v-slot:activator="{ on, attrs }">
                  <v-btn
                      color="amber"
                      dark
                      class="mb-2"
                      v-bind="attrs"
                      v-on="on"
                  >
                    New Judge
                  </v-btn>
                </template>
                <v-card>
                  <v-card-title>
                    <span class="headline">{{ formTitle }}</span>
                  </v-card-title>
                  <v-card-text>
                    <v-container>
                      <v-row v-if="crudJudgeError">
                        <v-col>
                          <v-alert
                              dense
                              outlined
                              type="error"
                          >
                            {{ crudJudgeError }}
                          </v-alert>
                        </v-col>
                      </v-row>
                      <v-row v-else-if="crudJudgeSuccess">
                        <v-col>
                          <v-alert
                              dense
                              outlined
                              type="success"
                          >
                            {{ crudJudgeSuccess }}
                          </v-alert>
                        </v-col>
                      </v-row>
                      <v-row>
                        <v-col
                            cols="12"
                        >
                          <v-text-field
                              v-model="editedJudge.firstName"
                              label="First Name *"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                        >
                          <v-text-field
                              v-model="editedJudge.lastName"
                              label="Last Name *"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                        >
                          <v-text-field
                              v-model="editedJudge.email"
                              label="Email *"
                          ></v-text-field>
                        </v-col>
                        <v-col cols="6">
                          <v-select
                            :items="['Mr.', 'Mrs.', 'Miss', 'Dr.']"
                            v-model="editedJudge.title"
                            label="Title"
                          >
                          </v-select>
                        </v-col>
                        <v-col cols="6">
                          <v-select
                            :items="['High School Diploma', 'Some College', 'Associates Degree', 'Bachelors Degree', 'Masters', 'PhD']"
                            v-model="editedJudge.highestDegree"
                            label="Highest Degree Earned"
                          >
                          </v-select>
                        </v-col>
                        <v-col cols="6">
                          <v-select
                            :items="['male', 'female', 'other']"
                            v-model="editedJudge.gender"
                            label="Gender"
                          >
                          </v-select>
                        </v-col>
                        <v-col cols="6">
                          <v-text-field
                            v-model="editedJudge.employer"
                            label="Employer"
                          >
                          </v-text-field>
                        </v-col>
                        <v-spacer></v-spacer>
                        <v-col>
                          <v-btn
                            color="amber"
                            dark
                            class="mb-2"
                            style="float: right"
                            @click="saveJudgeForm"
                          >
                            Submit
                          </v-btn>
                        </v-col>
                      </v-row>
                    </v-container>
                  </v-card-text>
                </v-card>
              </v-dialog>
            </v-toolbar>
          </template>
          <template v-slot:item.actions="{ item }">
            <v-icon
                small
                class="mr-2"
                @click="editJudge(item)"
            >
              mdi-pencil
            </v-icon>
            <v-icon
                small
                @click="deleteJudge(item)"
            >
              mdi-delete
            </v-icon>
          </template>
          <template v-slot:expanded-item="{ item, headers }">
            <td :colspan="headers.length">
              <v-container>
                <v-row>
                  <v-col class="headline">
                    {{ item.firstName }} {{ item.lastName}}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    <span class="font-weight-bold">Judge Email:</span>
                    {{ item.email }}
                  </v-col>
                </v-row>
              </v-container>
            </td>
          </template>
        </v-data-table>
      </v-col>
    </v-row>
    <v-row v-if="pendingJudgeUpdateError">
      <v-col>
        <v-alert
            dense
            outlined
            type="error"
        >
          {{ pendingJudgeUpdateError }}
        </v-alert>
      </v-col>
    </v-row>
    <v-row v-else-if="pendingJudgeUpdateSuccess">
      <v-col>
        <v-alert
            dense
            outlined
            type="success"
        >
          {{ pendingJudgeUpdateSuccess }}
        </v-alert>
      </v-col>
    </v-row>
    <v-row>
      <v-col>
        <v-data-table
            :headers="pendingHeaders"
            :items="pendingJudges"
            show-expand
            item-key="email"
            :loading="pendingLoading"
            :mobile-breakpoint="0"
            class="elevation-1"
            :loading-text="pendingLoadingMessage"
            no-data-text="No Judges Pending Approval"
            :footer-props="{itemsPerPageOptions: [10, 25, 50]}"
        >
          <template v-slot:top>
            <v-toolbar flat>
              <v-toolbar-title>Judges Pending Approval</v-toolbar-title>
            </v-toolbar>
          </template>
          <template v-slot:item.actions="{ item }">
            <v-icon
              small
              @click="approveJudgeClicked(item)"
              >
              mdi-thumb-up
            </v-icon>
            <v-icon
              small
              @click="denyJudgeClicked(item)"
              >
              mdi-thumb-down
            </v-icon>
          </template>
          <template v-slot:expanded-item="{ item, headers }">
            <td :colspan="headers.length">
              <v-container>
                <v-row>
                  <v-col class="headline">
                    {{ item.firstName }} {{ item.lastName}}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    <span class="font-weight-bold">Judge Email:</span>
                    {{ item.email }}
                  </v-col>
                </v-row>
              </v-container>
            </td>
          </template>
        </v-data-table>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import {mapState, mapActions} from 'vuex';

export default {
  name: 'Judge',
  data: () => ({
    headers: [
      {text: 'First Name', value: 'firstName'},
      {text: 'Last Name', value: 'lastName'},
      {text: 'Email', value: 'email'},
      {text: 'Checked In', value: 'checkedIn'},
      {text: 'Actions', value: 'actions'},
      {text: '', value: 'data-table-expand'},
    ],
    pendingHeaders: [
      {text: 'First Name', value: 'firstName'},
      {text: 'Last Name', value: 'lastName'},
      {text: 'Email', value: 'email'},
      {text: 'Actions', value: 'actions'},
      {text: '', value: 'data-table-expand'},
    ],
    loading: false,
    pendingLoading: false,
    pendingLoadingMessage: 'Fetching Judges Pending Approval',
    formDialog: false,
    editedIndex: -1,
    pendingJudgeUpdateError: "",
    pendingJudgeUpdateSuccess: "",
    editedJudge: {
      firstName: '',
      lastName: '',
      judgeEmail:'',
    },
    crudJudgeError: '',
    crudJudgeSuccess: '',
    err: null
  }),
  computed: {
    ...mapState({
      judges: state => state.judges,
      pendingJudges: state => state.pendingJudges,
    }),
    formTitle() {
      return this.editedIndex === -1 ? 'New Judge' : 'Edit Judge'
    },
  },
  watch: {
    formDialog(val) {
      this.reloadJudgesTable();
      if (val === false) {
        this.editedIndex = -1;
        for (const key in this.editedJudge) {
          this.editedJudge[key] = '';
        }
      }
    },
  },
  methods: {
    ...mapActions({
      refreshJudges: 'refreshJudges',
      refreshPendingJudges: 'refreshPendingJudges',
      denyJudge: 'denyJudge',
      approveJudge: 'approveJudge',
      createJudge: 'createJudge',
      updateJudge: 'updateJudge',
    }),
    saveJudgeForm() {
      if (this.editedIndex >= 0) {
        // updating
        this.updateJudge({operatorId: this.editedJudge.operatorId}).then(res => {
          this.crudJudgeError = '';
          this.crudJudgeSuccess = 'Judge updated';
        }).catch(err => {
          this.crudJudgeSuccess = '';
          this.crudJudgeError = 'Failed to update judge';
          console.log(err)
        })
      } else {
        // create new
        this.createJudge(this.editedJudge).then(res => {
          this.crudJudgeError = '';
          this.crudJudgeSuccess = 'Judge created';
        }).catch(err => {
          this.crudJudgeSuccess = '';
          this.crudJudgeError = 'Failed to create judge';
          console.log(err)
        })
      }
    },
    editJudge(item) {
      this.editedIndex = this.judges.indexOf(item)
      this.editedJudge = {
        firstName: item.firstName,
        lastName: item.lastName,
        email: item.email,
        title: item.title,
        highestDegree: item.highestDegree,
        gender: item.gender,
        employer: item.employer,
      }
      this.formDialog = true
    },
    deleteJudge(item) {
      this.editedIndex = this.judges.indexOf(item)
      this.editedJudge = Object.assign({}, item)
      this.dialogDelete = true
    },
    approveJudgeClicked(item) {
      this.pendingLoading = true;
      this.pendingLoadingMessage = "Approving judge";
      this.approveJudge({operatorId: item.operatorId}).then(() => {
        this.pendingJudgeUpdateError = '';
        this.pendingJudgeUpdateSuccess = 'Judge Approved!'
      }).catch(err => {
        this.pendingJudgeUpdateSuccess = '';
        this.pendingJudgeUpdateError = 'Failed to approve judge';
      }).finally(() => {
        this.reloadPendingJudgesTable();
        this.reloadJudgesTable();
      })
    },
    denyJudgeClicked(item) {
      this.pendingLoading = true;
      this.pendingLoadingMessage = "Denying judge";
      this.denyJudge({operatorId: item.operatorId}).then(() => {
        this.pendingJudgeUpdateError = '';
        this.pendingJudgeUpdateSuccess = 'Judge Denied.'
      }).catch(err => {
        console.log(err)
        this.pendingJudgeUpdateSuccess = '';
        this.pendingJudgeUpdateError = 'Failed to deny judge';
      }).finally(() => {
        this.reloadPendingJudgesTable();
      })
    },
    reloadPendingJudgesTable() {
      this.pendingLoading = true;
      this.pendingLoadingMessage = "Fetching Judges Pending Approval";
      this.refreshPendingJudges().catch(err => {
        this.pendingJudgeUpdateError = err;
      }).finally(() => {
        this.pendingLoading = false;
      })
    },
    reloadJudgesTable() {
      this.loading = true;
      this.refreshJudges().catch(err => {
        this.err = err;
      }).finally(() => {
        this.loading = false;
      })
    },
  },
  filters: {
    fullName: (val) => {
      let name = `${val.firstName} ${val.lastName}`;
      name += val.suffix ? ` ${val.suffix}` : ``;
      return name;
    }
  },
  mounted() {
    this.reloadJudgesTable();
    this.reloadPendingJudgesTable();
  }
}
</script>