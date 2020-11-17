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
            :items="students"
            show-expand
            item-key="studentId"
            :loading="loading"
            :mobile-breakpoint="0"
            class="elevation-1 mt-8"
            loading-text="Fetching students"
            no-data-text="No Students to show"
            :footer-props="{itemsPerPageOptions: [10, 25, 50]}"
        >
          <template v-slot:top>
            <v-toolbar flat>
              <v-toolbar-title>Students</v-toolbar-title>
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
                    New Students
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
                              v-model="editedStudent.firstName"
                              label="First  Name *"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                        >
                          <v-text-field
                              v-model="editedStudent.lastName"
                              label="Last Name *"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                        >
                          <v-select
                              :items="schools"
                              v-model="editedStudent.schoolId"
                              label="School"
                          ></v-select>
                        </v-col>
                        <v-col
                            cols="12"
                        >
                          <v-select
                              :items="projects"
                              v-model="editedStudent.projectId"
                              label="Project"
                          ></v-select>
                        </v-col>
                        <v-col
                            cols="12"
                        >
                          <v-select
                              :items="gradeLevel"
                              v-model="editedStudent.gradeLevelId"
                              label="Grade Level"
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
                @click="editStudent(item)"
            >
              mdi-pencil
            </v-icon>
            <v-icon
                small
                @click="deleteStudent(item)"
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
                    <span class="font-weight-bold">Student Id:</span>
                    {{ item.studentId }}
                  </v-col>
                  <v-col>
                    <span class="font-weight-bold">School:</span>
                    {{ item.school.name }}
                  </v-col>
                  <v-col>
                    <span class="font-weight-bold">Project:</span>
                    {{ item.project.name }}
                  </v-col>
                  <v-col>
                    <span class="font-weight-bold">Grade Level:</span>
                    {{ item.gradeLevel.name }}
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
  name: 'Students',
  data: () => ({
    headers: [
      {text: 'FirstName', value: 'firstName'},
      {text: 'LastName', value: 'lastName'},
      {text: 'School', value: 'school.name'},
      {text: 'Project', value: 'project.name'},
      {text: 'GradeLevel', value: 'gradeLevel.name'},
      {text: 'Actions', value: 'actions'},
      {text: '', value: 'data-table-expand'},
    ],
    loading: false,
    formDialog: false,
    editedIndex: -1,
    editedStudent: {
      firstName: '',
      lastName: '',
      studentId: '',
      projectName: '',
      gradeLevel: '',
    },
    err: null
  }),
  computed: {
    ...mapState({
      students: state => state.students,
      schools: state => state.schools.map(school => ({text: school.name, value: school.schoolId})),
      projects: state => state.projects.map(project => ({text: project.name, value: project.projectId})),
      gradeLevel: state => state.gradeLevels.map(gradeLevel => ({
        text: gradeLevel.name,
        value: gradeLevel.gradeLevelId
      })),
    }),
    formTitle() {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
  },
  watch: {
    formDialog: (val) => {
      if (val === false) {
        this.editedIndex = -1;
        for (const key in this.editedStudent) {
          this.editedStudent[key] = '';
        }
      }
    }
  },
  methods: {
    ...mapActions({
      refreshStudents: 'refreshStudents',
      refreshSchools: 'refreshSchools',
      refreshProjects: 'refreshProjects',
      refreshGradeLevels: 'refreshGradeLevels',
    }),
    editStudent(item) {

      this.editedIndex = this.students.indexOf(item)
      this.editedStudent = {
        firstName: item.firstName,
        lastName: item.lastName,
        schoolId: item.school.id,
        projectId: item.project.id,
        gradeLevelId: item.gradeLevel.id
      }
      this.formDialog = true
    },
    deleteStudent(item) {
      this.editedIndex = this.students.indexOf(item)
      this.editedStudent = Object.assign({}, item)
      this.dialogDelete = true
    }
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
    this.refreshStudents().then(() => {
      this.refreshSchools().then(() => {
        this.refreshSchools().then(() => {
          this.refreshProjects().catch(err => {
            this.err = err;
          })
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