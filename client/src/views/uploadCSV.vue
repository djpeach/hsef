<template>
  <v-container>
    <v-row>
      <v-col>
        <p>Upload Student and Project Information</p>
      </v-col>
    </v-row>
    <form enctype="multipart/form-data" method="post" action="uploadStudent.php">
    <table border="1">
    <tr >
    <td colspan="2" align="center"><strong>Step 1: Upload Students</strong></td>
    </tr>
    <tr>
    <td align="center">File:</td><td><input type="file" name="file" id="file"></td></tr>
    <tr >
    <td colspan="2" align="center"><input type="submit" value="Upload"></td>
    </tr>
    </table>
    </form>
        <form enctype="multipart/form-data" method="post" action="uploadProject.php">
    <table border="1">
    <tr >
    <td colspan="2" align="center"><strong>Step 2: Upload Projects</strong></td>
    </tr>
    <tr>
    <td align="center">File:</td><td><input type="file" name="file" id="file"></td></tr>
    <tr >
    <td colspan="2" align="center"><input type="submit" value="Upload"></td>
    </tr>
    </table>
    </form>
  </v-container>   
</template>

<script>
export default {
  name: 'uploadCSV',
  data: () => ({
    // ...
  }),
}
</script>