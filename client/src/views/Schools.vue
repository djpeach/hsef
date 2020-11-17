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
            :items="schools"
            show-expand
            item-key="schoolId"
            :loading="loading"
            :mobile-breakpoint="0"
            class="elevation-1 mt-8"
            loading-text="Fetching schools"
            no-data-text="No Schools to show"
            :footer-props="{itemsPerPageOptions: [10, 25, 50]}"
        >
          <template v-slot:top>
            <v-toolbar flat>
              <v-toolbar-title>Schools</v-toolbar-title>
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
                    New Schools
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
                              v-model="editedSchool.name"
                              label="Name *"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                        >
                          <v-select
                              :items="counties"
                              v-model="editedSchool.countyId"
                              label="County"
                          ></v-select>
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
                @click="editSchool(item)"
            >
              mdi-pencil
            </v-icon>
            <v-icon
                small
                @click="deleteSchool(item)"
            >
              mdi-delete
            </v-icon>
          </template>
          <template v-slot:expanded-item="{ item, headers }">
            <td :colspan="headers.length">
              <v-container>
                <v-row>
                  <v-col class="headline">
                    {{ item.name }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    <span class="font-weight-bold">School Id:</span>
                    {{ item.schoolId }}
                  </v-col>
                  <v-col>
                    <span class="font-weight-bold">County:</span>
                    {{ item.county.name }}
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
  name: 'Schools',
  data: () => ({
    headers: [
      {text: 'School Name', value: 'name'},
      {text: 'County', value: 'county.name'},
      {text: 'Actions', value: 'actions'},
      {text: '', value: 'data-table-expand'},
    ],
    loading: false,
    formDialog: false,
    editedIndex: -1,
    editedSchool: {
      name: '',
      countyId: '',
    },
    err: null
  }),
  computed: {
    ...mapState({
      schools: state => state.schools,
      counties: state => state.counties.map(county => ({text: county.name, value: county.countyId})),
    }),
    formTitle() {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
  },
  watch: {
    formDialog(val){
      if (val === false) {
        this.editedIndex = -1;
        for (const key in this.editedSchool) {
          this.editedSchool[key] = '';
        }
      }
    }
  },
  methods: {
    ...mapActions({
      refreshSchools: 'refreshSchools',
      refreshCounties: 'refreshCounties',
    }),
    editSchool(item) {
      this.editedIndex = this.schools.indexOf(item)
      this.editedSchool = {name: item.name, countyId: item.county.id}
      this.formDialog = true
    },
    deleteSchool(item) {
      this.editedIndex = this.schools.indexOf(item)
      this.editedSchool = Object.assign({}, item)
      this.dialogDelete = true
    }
  },
  mounted() {
    this.loading = true;
    this.refreshSchools().then(() => {
      this.refreshCounties().catch(err => {
        this.err = err;
      })
    }).catch(err => {
      this.err = err;
    }).finally(() => {
      this.loading = false;
    })
  }
}
</script>