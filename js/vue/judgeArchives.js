var judgeArchivesApp = new Vue({
  data: {
    loading: true,
    judges: null,
    archiveYear: new Date().getFullYear() - 1,
    error: ''
  },
  watch: {
    archiveYear: function(p, n) {
      this.fetchJudges();
    }
  },
  methods: {
    fetchJudges: function() {
      this.loading = true;
      let vm = this;
      axios.get(`/archives/judges?year=${vm.archiveYear}`).then(function(res) {
        vm.judges = res.data;
        vm.error = '';
        vm.loading = false;
      }).catch(function(err) {
        vm.error = err.message;
        vm.loading = false;
      })
    }
  },
  filters: {
    fullName: function(user) {
      if (!user) {
        return '';
      } else {
        let name = user.FirstName;
        name += ` ${user.LastName}`;
        name += user.Suffix ? ` ${user.Suffix}` : ``;
        return name;
      }
    }
  },
  mounted: function() {
    this.fetchJudges();
  }
})

$(document).ready(function() {
  judgeArchivesApp.$mount('#app');
});