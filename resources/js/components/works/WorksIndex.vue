<template>
  <div>
    <div class="form-group">
      <router-link :to="{ name: 'createWork' }" class="btn btn-success"
        >Create new work</router-link
      >
    </div>

    <div class="card">
      <div class="card-header">Works list</div>
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Website</th>
              <th>Email</th>
              <th>Person</th>
              <th>Phone</th>
              <th width="100">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(work, index) in works">
              <td>{{ work.name }}</td>
              <td>{{ work.desc }}</td>
              <td>{{ work.website }}</td>
              <td>{{ work.email }}</td>
              <td>{{ work.person }}</td>
              <td>{{ work.phone }}</td>
              <td style="display:flex">
                <router-link
                  :to="{ name: 'editWork', params: { id: work.id } }"
                  class="btn btn-xs btn-default"
                >
                  Edit
                </router-link>
                <a
                  href="#"
                  class="btn btn-xs btn-danger ml-2"
                  v-on:click="deleteEntry(work.id, index)"
                >
                  Delete
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      works: [],
    };
  },
  mounted() {
    var app = this;
    axios
      .get("/api/v1/works")
      .then(function (resp) {
        app.works = resp.data;
      })
      .catch(function (resp) {
        console.log(resp);
        alert("Could not load companies");
      });
  },
  methods: {
    deleteEntry(id, index) {
      if (confirm("Do you really want to delete it?")) {
        var app = this;
        axios
          .delete("/api/v1/works/" + id)
          .then(function (resp) {
            app.works.splice(index, 1);
          })
          .catch(function (resp) {
            alert("Could not delete works");
          });
      }
    },
  },
};
</script>

<style scoped>
</style>