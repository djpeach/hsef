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
            :items="booths"
            show-expand
            item-key="boothId"
            :loading="loading"
            :mobile-breakpoint="0"
            class="elevation-1 mt-8"
            loading-text="Fetching booths"
            no-data-text="No booths to show"
            :footer-props="{itemsPerPageOptions: [10, 25, 50]}"
        >
          <template v-slot:top>
            <v-toolbar flat>
              <v-toolbar-title>Booths</v-toolbar-title>
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
                    New Booths
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
                              v-model="editedBooth.number"
                              label="Number *"
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
                @click="editBooth(item)"
            >
              mdi-pencil
            </v-icon>
            <v-icon
                small
                @click="deleteBooth(item)"
            >
              mdi-delete
            </v-icon>
          </template>
          <template v-slot:expanded-item="{ item, headers }">
            <td :colspan="headers.length">
              <v-container>
                <v-row>
                  <v-col class="headline">
                    {{ item.number }}
                  </v-col>
                </v-row>
                <v-row>
                  <v-col>
                    <span class="font-weight-bold">Booth:</span> {{ item.number }}
                  </v-col>
                  <v-col>
                    <span class="font-weight-bold">Booth Id:</span> {{ item.boothId }}
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
import { mapState, mapActions } from 'vuex';

export default {
  number: 'Booth',
  data: () => ({
    headers: [
      { text: 'Booth', value: 'number' },
      {text: 'Actions', value: 'actions'},
      { text: '', value: 'data-table-expand' },
    ],
    loading: false,
    formDialog: false,
    editedIndex: -1,
    editedBooth: {
      number: '',
      boothId: '',
    },
    err: null
  }),
  computed: {
    ...mapState({
      booths: state => state.booths,
    }),
    formTitle () {
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
      refreshBooths: 'refreshBooths',
    }),
    editBooth (item) {
      this.editedIndex = this.booths.indexOf(item)
      this.editedBooth = { number: item.number}
      this.formDialog = true
    },
    deleteBooth (item) {
      this.editedIndex = this.booths.indexOf(item)
      this.editedBooth = Object.assign({}, item)
      this.dialogDelete = true
    }
  },
  mounted() {
    this.loading = true;
    this.refreshBooths().catch(err => {
      this.err = err;
    }).finally(() => {
      this.loading = false;
    })
  }
}
</script>