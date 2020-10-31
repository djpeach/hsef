<template>
  <v-app>
    <v-main>
      <AppNav/>
      <router-view/>
    </v-main>
  </v-app>
</template>

<script>
import AppNav from "@/components/common/AppNav";

export default {
  name: 'App',

  components: {
    AppNav
  },

  data: () => ({
    // ...
  }),
};
</script>
