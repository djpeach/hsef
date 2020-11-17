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
            class="elevation-1 mt-8"
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
                    New Judges
                  </v-btn>
                </template>
                <v-card>
                  <v-card-title>
                    <span class="headline">{{ formTitle }}</span>
                  </v-card-title>
                  <v-card-text>
                    <v-container>
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
                    {{ item.firstName }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    <span class="font-weight-bold">First Name:</span>
                    {{ item.firstName }}
                  </v-col>
                  <v-col>
                    <span class="font-weight-bold">Last Name:</span>
                    {{ item.lastName }}
                  </v-col>
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
    loading: false,
    formDialog: false,
    editedIndex: -1,
    editedJudge: {
      firstName: '',
      lastName: '',
      judgeEmail:'',
    },
    err: null
  }),
  computed: {
    ...mapState({
      judges: state => state.judges,
    }),
    formTitle() {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
  },
  watch: {
    formDialog: (val) => {
      if (val === false) {
        this.editedIndex = -1;
      }
    },
  },
  methods: {
    ...mapActions({
      refreshJudges: 'refreshJudges',
    }),
    editJudge(item) {
      this.editedIndex = this.judges.indexOf(item)
      this.editedJudge = {
        firstName: item.firstName,
        lastName: item.lastName,
        email: item.email
      }
      this.formDialog = true
    },
    deleteJudge(item) {
      this.editedIndex = this.judges.indexOf(item)
      this.editedJudge = Object.assign({}, item)
      this.dialogDelete = true
    },
    convertCheckIn(item) {
      if (this.item = 0)  {
        this.item = "Checked Out"
      } else {
        this.item = "Checked In"
      }
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
    this.loading = true;
    this.refreshJudges().catch(err => {
      this.err = err;
    }).finally(() => {
      this.loading = false;
    })
  }
}
</script>