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
            :items="gradeLevels"
            show-expand
            item-key="gradeLevelId"
            :loading="loading"
            :mobile-breakpoint="0"
            class="elevation-1 mt-8"
            loading-text="Fetching gradeLevels"
            no-data-text="No GradeLevels to show"
            :footer-props="{itemsPerPageOptions: [10, 25, 50]}"
        >
          <template v-slot:top>
            <v-toolbar flat>
              <v-toolbar-title>GradeLevels</v-toolbar-title>
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
                    New GradeLevels
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
                              v-model="editedGradeLevel.name"
                              label="Grade Level *"
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
                @click="editGradeLevel(item)"
            >
              mdi-pencil
            </v-icon>
            <v-icon
                small
                @click="deleteGradeLevel(item)"
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
                    <span class="font-weight-bold">GradeLevel:</span>
                    {{ item.name }}
                  </v-col>
                  <v-col>
                    <span class="font-weight-bold">GradeLevel Id:</span>
                    {{ item.gradeLevelId }}
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
  name: 'GradeLevel',
  data: () => ({
    headers: [
      {text: 'GradeLevel', value: 'name'},
      {text: 'Actions', value: 'actions'},
      {text: '', value: 'data-table-expand'},
    ],
    loading: false,
    formDialog: false,
    editedIndex: -1,
    editedGradeLevel: {
      name: '',
      gradeLevelId: '',
    },
    err: null
  }),
  computed: {
    ...mapState({
      gradeLevels: state => state.gradeLevels,
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
      refreshGradeLevels: 'refreshGradeLevels',
    }),
    editGradeLevel(item) {
      this.editedIndex = this.gradeLevels.indexOf(item)
      this.editedGradeLevel = {name: item.name}
      this.formDialog = true
    },
    deleteGradeLevel(item) {
      this.editedIndex = this.gradeLevels.indexOf(item)
      this.editedGradeLevel = Object.assign({}, item)
      this.dialogDelete = true
    }
  },
  mounted() {
    this.loading = true;
    this.refreshGradeLevels().catch(err => {
      this.err = err;
    }).finally(() => {
      this.loading = false;
    })
  }
}
</script>