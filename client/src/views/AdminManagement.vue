<template>
  <v-container>
    <v-row justify="center">
      <v-col>
        <v-data-table
            :headers="headers"
            :items="admins"
            item-key="name"
            :options.sync="options"
            :server-items-length="totalAdmins"
            :loading="loading"
            class="elevation-1 mt-8"
            loading-text="Fetching admins"
            no-data-text="No Admins to show"
            :footer-props="{itemsPerPageOptions: [10, 25, 50]}"
        >
          <template v-slot:top>
            <v-toolbar flat>
              <v-toolbar-title>Admins</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-dialog v-model="createDialog" max-width="500px">
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
                        <v-col>

                        </v-col>
                      </v-row>
                    </v-container>
                  </v-card-text>
                </v-card>
              </v-dialog>
            </v-toolbar>
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
    headers : [
      {text: 'FirstName', value: 'firstName'},
      {text: 'LastName', value: 'lastName'},
      {text: 'Email', value: 'email'},
      {text: 'Gender', value: 'gender'},
    ],
    admins: [],
    loading: false,
    options: {},
    totalAdmins: 0,
    createDialog: false
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
    }
  },
  computed: {
    formTitle () {
      return 'New Admin'
    }
  },
  methods: {
    fetchAdmins() {
      if (this.loading) return;
      this.loading = true;
      const { page, itemsPerPage } = this.options;
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
    }
  }
}
</script>
