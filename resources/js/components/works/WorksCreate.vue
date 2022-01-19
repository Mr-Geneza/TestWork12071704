<template>
  <div>
    <div class="form-group">
      <router-link to="/" class="btn btn-default">Back</router-link>
    </div>

    <div class="card">
      <div class="card-header">Create new work</div>
      <div class="card-body">
        <form v-on:submit="saveForm()">
          <div class="row">
            <div class="col-xs-12 form-group">
              <label class="control-label">Work name</label>
              <input type="text" v-model="work.name" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 form-group">
              <label class="control-label">Work description</label>
              <input type="text" v-model="work.desc" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 form-group">
              <label class="control-label">Work website</label>
              <input type="text" v-model="work.website" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 form-group">
              <label class="control-label">Work email</label>
              <input type="text" v-model="work.email" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 form-group">
              <label class="control-label">Work person</label>
              <input type="text" v-model="work.person" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 form-group">
              <label class="control-label">Work phone</label>
              <input type="text" v-model="work.phone" class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 form-group">
              <button class="btn btn-success">Create</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      work: {
        name: "",
        desc: "",
        website: "",
        email: "",
        person: "",
        phone: "",
      },
    };
  },
  methods: {
    saveForm() {
      event.preventDefault();
      var app = this;
      var newWork = app.work;
      axios
        .post("/api/v1/works", newWork)
        .then(function (resp) {
          app.$router.push({ path: "/" });
        })
        .catch(function (resp) {
          console.log(resp);
          alert("Could not create your work");
        });
    },
  },
};
</script>