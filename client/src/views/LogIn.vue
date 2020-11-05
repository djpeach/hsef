<template>
   <v-container>
    <v-row align="center"
      justify="space-around">
      <v-col>
        <p>Upload Student and Project Info</p>
      </v-col>
      <div id="app" >
  <v-app id="inspire" align="left">
    <p>Username</p>
    <v-text-field
              label="Enter Username"
            ></v-text-field>
       <p>Password</p>
    <v-text-field
              label="Enter Password"
            ></v-text-field>
      <v-btn color="amber" depressed>
        Log In
      </v-btn>
  </v-app>
</div>
      
    </v-row>
  </v-container>  

</template>

<script>
export default {
  name: 'LogIn',
  el: '#app',
  data: () => ({
    // ...
  }),
}
</script>