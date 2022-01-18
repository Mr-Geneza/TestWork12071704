<template>
  <form @submit.prevent>
    <h4>Create Todo</h4>
    <my-input v-model="todo.title" type="text" placeholder="Title" />
    <my-input
      v-model="todo.description"
      type="text"
      placeholder="Description"
    />
    <my-button @click="createTodo">Create</my-button>
  </form>
</template>

<script>
import axios from "axios";
export default {
  components: {},
  data() {
    return {
      todo: {
        title: "",
        description: "",
      },
    };
  },
  methods: {
    async createTodo() {
      if (!this.todo.title) {
			alert('Title is empty!')
			return
      }
		if (!this.todo.description){
			alert('Description is empty!')
			return
		}
      try {
        await axios.post(
          "http://127.0.0.1:8000/api/todo",
          {
            title: this.todo.title,
            description: this.todo.description,
          },
          {
            headers: {
              "Content-Type": "application/json",
              Authorization:
                "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTYwZjM2MC05NDJmLTQxZmUtODEzYi1iNzE4NTE4MDNlNjUiLCJqdGkiOiI5MmEwZDNhNWIxYjczNmM4MzkwM2EwMzgxOWY5MmM2NDM1YzBiMDJiYzQ3MGRiZDIyMmI0ODI1OGI4MDMzMGI2ZjRkNzNlYjNkMmYwMzJlYyIsImlhdCI6MTY0MjQ3NDIwOS4xOTg4LCJuYmYiOjE2NDI0NzQyMDkuMTk4ODA1LCJleHAiOjE2NzQwMTAyMDkuMTE0OTU3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Hj9-LIatsNfmfjrByIaIvJvuZGJQ2bLQ1lTwn1yotpjhWu9Kfqx_GsYAAD5DiuIuxnlw41_nDBLv0E3k54dLolFqFIasP17uy2N38A8pGSC0vjXV5HwrDbXAnpU1LKVkQrWr8hsP_PBHpGcJAtL_0GYrelZLxcAcCsjTA0yzBjP7qK_oAvO39l8Jyi04NDano1PovT-pyI4vhOPAgAxE47ZYiYF2uC-J2F3LfFIm3BuIWOLXo6ELo8wevqycdFPckNK8u8sWCF_0E0L8UePk1FNHgSS9c623XP7BaGVjmoA4flbZKkGxsEGIUCkgTPj9afJf1z-rI6ftulrZFNq70VbeG7ly9RHNtXRldZguhOhETrjVYmjo0f2WYEQwWYX4QrZfKU5NhVCG4gQavmxwrgDlqLkF9bDBh8I9lagQ53QUmZwpkCCjVakJXLreOmbvqL6SX3JnSzJtCem9gs3-NRbb8vH6W7Xj-6tJYpBa8-Mk_KLsk6-tbnj0fPOZeZawxzvKjmb9GL0Ei4drKDktM1_DKi8u_LAfwCAHAlBgtcpXM43R-UZpv9hK3nsWjQHS6OPk7D3SpMTktrcZFD_s0XkJNM6I59lfzyjhV3bY2iGfCVNuNipXgAegEDo9q7RGsVJKjLzw9pBxpgEgaAW5sLF-mks5u8-qW-0VUyehh0g",
            },
          }
        );
        this.$emit("create", this.todo);
        this.todo = {
          title: "",
          description: "",
        };
      } catch (e) {
        alert("Ошибка");
      }
    },
  },
};
</script>

<style scoped>
form {
  display: flex;
  flex-direction: column;
}
</style>	