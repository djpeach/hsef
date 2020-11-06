<template>
  <v-container>
    <v-row>
      <v-col>
          <v-title
          class="teal--text text--darken-4
                 font-weight-bold
                 text-center
                 my-10
                 "
          >
        <h2>Welcome to the Students</h2>
          </v-title>
      </v-col>
    </v-row>
    <v-row justify="center">
      <v-col>
        <v-data-table
            :headers="headers"
            :items="students"
            show-expand
            item-key="email"
            :options.sync="options"
            :server-items-length="totalStudents"
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
                    New Student
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
                            sm="5"
                        >
                          <v-text-field
                              v-model="editedStudent.firstName"
                              label="First Name *"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                            sm="5"
                        >
                          <v-text-field
                              v-model="editedStudent.lastName"
                              label="Last Name *"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                            sm="2"
                        >
                          <v-text-field
                              v-model="editedStudent.suffix"
                              label="Suffix"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                        >
                          <v-text-field
                              v-model="editedStudent.email"
                              label="Email"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                            sm="6"
                        >
                          <v-text-field
                              v-model="editedStudent.title"
                              label="Title"
                          ></v-text-field>
                        </v-col>

                        <v-col
                            cols="12"
                        >
                          <v-select
                              :items="[{text: 'Male', value: 'male'},{text: 'Female', value: 'female'},{text: 'Other', value: 'other'}]"
                              v-model="editedStudent.gender"
                              label="Gender"
                          ></v-select>
                        </v-col>
                      </v-row>
                    </v-container>
                  </v-card-text>
                </v-card>
              </v-dialog>
            </v-toolbar>
          </template>
          <template v-slot:item.email="{ item }">
            <a :href="`mailto:${item.email}`">{{item.email}}</a>
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
                @click="deleteItem(item)"
            >
              mdi-delete
            </v-icon>
          </template>
          <template v-slot:expanded-item="{ item, headers }">
            <td :colspan="headers.length">
              <v-container>
                <v-row>
                  <v-col class="headline">
                    {{ item | fullname }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    <span class="font-weight-bold">Email:</span> {{ item.email }}
                  </v-col>
                  <v-col>
                    <span class="font-weight-bold">Gender:</span> {{ item.gender }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    <span class="font-weight-bold">Title:</span> {{ item.title }}
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
import axios from 'axios';
import { mapState, mapActions } from 'vuex';

export default {
  name: 'StudentManagement',
  data: () => ({
    headers : [
      {text: 'FirstName', value: 'firstName'},
      {text: 'LastName', value: 'lastName'},
      {text: 'Email', value: 'email'},
      {text: 'Actions', value: 'actions'},
      { text: '', value: 'data-table-expand' },
    ],
    students: [],
    loading: false,
    options: {},
    totalStudents: 0,
    formDialog: false,
    editedIndex: -1,
    editedStudent: {
      firstName: '',
      lastName: '',
      suffix: '',
      title: '',
      email: '',
      gender: '',
    },
  }),
  mounted() {
    this.fetchStudents();
    this.getStudents({
      limit: 10,
      offset: 0
    }).then(res => {
      console.log(res)
    }).catch(err => {
      console.log(err)
    })
  },
  watch: {
    options: {
      handler() {
        this.fetchStudents();
      },
      deep: true,
    },
    formDialog: (val) => {
      if (val === false) {
        this.editedIndex = -1;
      }
    }
  },
  computed: {
    formTitle () {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    },
    ...mapState({
      students: state => state.students
    })
  },
  methods: {
    fetchStudents() {
      if (this.loading) return;
      this.loading = true;
      const { page, itemsPerPage } = this.options;
      axios.get('/list/students', {
        params: {
          year: 2020,
          offset: (page - 1) * itemsPerPage,
          limit: itemsPerPage
        }
      }).then(res => {
        console.log(res.data);
        this.students = res.data.results;
        this.totalStudents = res.data.total;
      }).catch(err => {

      }).finally(() => {
        this.loading = false;
      })
    },
    editStudent (student) {
      this.editedIndex = this.students.indexOf(student)
      this.editedStudent = Object.assign({}, student)
      this.formDialog = true
    },
    deleteItem (item) {
      this.editedIndex = this.students.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialogDelete = true
    },
    ...mapActions({
      getStudents: 'refreshStudents'
    })
  },
  filters: {
    fullname: (val) => {
      let name = `${val.firstName} ${val.lastName}`;
      name += val.suffix ? ` ${val.suffix}` : ``;
      return name;
    }
  }
}
</script>
