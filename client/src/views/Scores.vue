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
            :items="projects"
            show-expand
            item-key="projectId"
            :loading="loading"
            :mobile-breakpoint="0"
            class="elevation-1 mt-8"
            loading-text="Fetching projects"
            no-data-text="No Scores to show"
            :footer-props="{itemsPerPageOptions: [10, 25, 50]}"
            :item="judgeSchedule"
            :key="judgeSchedule.sessionId"
        >
          <template v-slot:top>
            <v-toolbar flat>
              <v-toolbar-title>Scores</v-toolbar-title>
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
                    New Scores
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
                              v-model="editedProject.name"
                              label="Name *"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                        >
                          <v-select
                              :items="categories"
                              v-model="editedProject.categoryId"
                              label="Category"
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
                @click="editProject(item)"
            >
              mdi-pencil
            </v-icon>
            <v-icon
                small
                @click="deleteProject(item)"
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
                    <span class="font-weight-bold">Project Id:</span>
                    {{ item.projectId }}
                  </v-col>
                  <v-col>
                    <span class="font-weight-bold">Category:</span>
                    {{ item.category.name }}
                  </v-col>
                  <v-col>
                    <span class="font-weight-bold">Score:</span>
                    {{ judgeSchedule.currentScore }}
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
  name: 'Projects',
  data: () => ({
    headers: [
      {text: 'Project Name', value: 'name'},
      {text: 'Category', value: 'category.name'},
      {text: 'Score', value: 'judgeSchedule.currentScore'},
      {text: 'Actions', value: 'actions'},
      {text: '', value: 'data-table-expand'},
    ],
    loading: false,
    formDialog: false,
    editedIndex: -1,
    editedProject: {
      name: '',
      projectId: '',
      categoryName: '',
    },
    err: null
  }),
  computed: {
    ...mapState({
      projects: state => state.projects,
      judgeSchedule: state => state.judgeSchedule,
      categories: state => state.categories.map(category => ({text: category.name, value: category.categoryId})),
    }),
    formTitle() {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
  },
  watch: {
    formDialog(val){
      if (val === false) {
        this.editedIndex = -1;
        for (const key in this.editedProject) {
          this.editedProject[key] = '';
        }
      }
    }
  },
  methods: {
    ...mapActions({
      refreshProjects: 'refreshProjects',
      refreshCategories: 'refreshCategories',
      getJudgeSchedule: 'refreshJudgeSchedule',
      saveScore: 'saveScore',
    }),
    saveCurrentScore(id) {
      const session = this.judgeSchedule.find(s => s.sessionId === id);
      this.saveScore({score: session.currentScore, id}).then(() => {
        session.dialog = false;
      })
    },
    editProject(item) {
      this.editedIndex = this.projects.indexOf(item)
      this.editedProject = {number: item.number, categoryId: item.category.id}
      this.formDialog = true
    },
    deleteProject(item) {
      this.editedIndex = this.projects.indexOf(item)
      this.editedProject = Object.assign({}, item)
      this.dialogDelete = true
    }
  },
  mounted() {
    this.loading = true;
    this.refreshProjects().then(() => {
      this.getJudgeSchedule().then(() => {
        this.refreshCategories().catch(err => {
          this.err = err;
        })
      })
    }).catch(err => {
      this.err = err;
    }).finally(() => {
      this.loading = false;
    })
  }
}
</script>