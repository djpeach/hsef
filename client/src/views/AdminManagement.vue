<template>
  <v-container>
    <v-row justify="center">
      <v-col>
        <v-data-table
            :headers="headers"
            :items="admins"
            show-expand
            item-key="email"
            :options.sync="options"
            :server-items-length="totalAdmins"
            :loading="loading"
            :mobile-breakpoint="0"
            class="elevation-1 mt-8"
            loading-text="Fetching admins"
            no-data-text="No Admins to show"
            :footer-props="{itemsPerPageOptions: [10, 25, 50]}"
        >
          <template v-slot:top>
            <v-toolbar flat>
              <v-toolbar-title>Admins</v-toolbar-title>
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
                    New Admin
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
                              v-model="editedAdmin.firstName"
                              label="First Name *"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                            sm="5"
                        >
                          <v-text-field
                              v-model="editedAdmin.lastName"
                              label="Last Name *"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                            sm="2"
                        >
                          <v-text-field
                              v-model="editedAdmin.suffix"
                              label="Suffix"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                        >
                          <v-text-field
                              v-model="editedAdmin.email"
                              label="Email"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                            sm="6"
                        >
                          <v-text-field
                              v-model="editedAdmin.title"
                              label="Title"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                            sm="6"
                        >
                          <v-text-field
                              v-model="editedAdmin.highestDegree"
                              label="Highest Degree"
                          ></v-text-field>
                        </v-col>
                        <v-col
                            cols="12"
                        >
                          <v-select
                              :items="[{text: 'Male', value: 'male'},{text: 'Female', value: 'female'},{text: 'Other', value: 'other'}]"
                              v-model="editedAdmin.gender"
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
            <a :href="`mailto:${item.email}`">{{ item.email }}</a>
          </template>
          <template v-slot:item.actions="{ item }">
            <v-icon
                small
                class="mr-2"
                @click="editAdmin(item)"
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
                    <span class="font-weight-bold">Email:</span>
                    {{ item.email }}
                  </v-col>
                  <v-col>
                    <span class="font-weight-bold">Gender:</span>
                    {{ item.gender }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    <span class="font-weight-bold">Title:</span>
                    {{ item.title }}
                  </v-col>
                  <v-col>
                    <span class="font-weight-bold">Highest Degree:</span>
                    {{ item.highestDegree }}
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

export default {
  name: 'AdminManagement',
  data: () => ({
    headers: [
      {text: 'FirstName', value: 'firstName'},
      {text: 'LastName', value: 'lastName'},
      {text: 'Email', value: 'email'},
      {text: 'Actions', value: 'actions'},
      {text: '', value: 'data-table-expand'},
    ],
    admins: [],
    loading: false,
    options: {},
    totalAdmins: 0,
    formDialog: false,
    editedIndex: -1,
    editedAdmin: {
      firstName: '',
      lastName: '',
      suffix: '',
      title: '',
      highestDegree: '',
      email: '',
      gender: '',
    },
  }),
  mounted() {
    this.fetchAdmins();
  },
  watch: {
    options: {
      handler() {
        this.fetchAdmins();
      },
      deep: true,
    },
    formDialog(val) {
      if (val === false) {
        this.editedIndex = -1;
        for (const key in this.editedAdmin) {
          this.editedAdmin[key] = '';
        }
      }
    }
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? 'New Item' : 'Edit Item'
    }
  },
  methods: {
    fetchAdmins() {
      if (this.loading) return;
      this.loading = true;
      const {page, itemsPerPage} = this.options;
      axios.get('/list/admins', {
        params: {
          year: 2020,
          offset: (page - 1) * itemsPerPage,
          limit: itemsPerPage
        }
      }).then(res => {
        console.log(res.data);
        this.admins = res.data.results;
        this.totalAdmins = res.data.total;
      }).catch(err => {

      }).finally(() => {
        this.loading = false;
      })
    },
    editAdmin(admin) {
      this.editedIndex = this.admins.indexOf(admin)
      this.editedAdmin = Object.assign({}, admin)
      this.formDialog = true
    },
    deleteItem(item) {
      this.editedIndex = this.admins.indexOf(item)
      this.editedItem = Object.assign({}, item)
      this.dialogDelete = true
    }
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
