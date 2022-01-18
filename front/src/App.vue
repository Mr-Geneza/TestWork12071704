<template>
  <div>
    <my-dialog v-model:show="dialogVisible">
      <h2>Edit Todo</h2>
      <form @submit.prevent>
        <div class="label"><strong>Title:</strong><my-input></my-input></div>
        <div class="label">
          <strong>Description:</strong> <my-input></my-input>
        </div>
        <div style="text-align: center">
          <my-button>Сохранить изменения</my-button>
        </div>
      </form>
    </my-dialog>
    <todo-form @create="createTodo" />
    <todo-list :todos="todos" @remove="removeTodo" />
  </div>
</template>

<script>
import TodoForm from "@/components/TodoForm";
import TodoList from "@/components/TodoList";
import axios from "axios";

export default {
  name: "App",
  components: {
    TodoForm,
    TodoList,
  },
  data() {
    return {
      todos: [],
      dialogVisible: false,
    };
  },
  methods: {
    editTodo(todo) {
		console.log(todo)
	 },
    createTodo(todo) {
      this.todos.push(todo);
    },
    removeTodo(todo) {
      this.todos = this.todos.filter((p) => p.id !== todo.id);
    },
    async fetchTodos() {
      try {
        const response = await axios({
          method: "get",
          url: "http://127.0.0.1:8000/api/todo",
          headers: {
            "Content-Type": "application/json",
            Authorization:
              "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5NTYwZjM2MC05NDJmLTQxZmUtODEzYi1iNzE4NTE4MDNlNjUiLCJqdGkiOiI5MmEwZDNhNWIxYjczNmM4MzkwM2EwMzgxOWY5MmM2NDM1YzBiMDJiYzQ3MGRiZDIyMmI0ODI1OGI4MDMzMGI2ZjRkNzNlYjNkMmYwMzJlYyIsImlhdCI6MTY0MjQ3NDIwOS4xOTg4LCJuYmYiOjE2NDI0NzQyMDkuMTk4ODA1LCJleHAiOjE2NzQwMTAyMDkuMTE0OTU3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.Hj9-LIatsNfmfjrByIaIvJvuZGJQ2bLQ1lTwn1yotpjhWu9Kfqx_GsYAAD5DiuIuxnlw41_nDBLv0E3k54dLolFqFIasP17uy2N38A8pGSC0vjXV5HwrDbXAnpU1LKVkQrWr8hsP_PBHpGcJAtL_0GYrelZLxcAcCsjTA0yzBjP7qK_oAvO39l8Jyi04NDano1PovT-pyI4vhOPAgAxE47ZYiYF2uC-J2F3LfFIm3BuIWOLXo6ELo8wevqycdFPckNK8u8sWCF_0E0L8UePk1FNHgSS9c623XP7BaGVjmoA4flbZKkGxsEGIUCkgTPj9afJf1z-rI6ftulrZFNq70VbeG7ly9RHNtXRldZguhOhETrjVYmjo0f2WYEQwWYX4QrZfKU5NhVCG4gQavmxwrgDlqLkF9bDBh8I9lagQ53QUmZwpkCCjVakJXLreOmbvqL6SX3JnSzJtCem9gs3-NRbb8vH6W7Xj-6tJYpBa8-Mk_KLsk6-tbnj0fPOZeZawxzvKjmb9GL0Ei4drKDktM1_DKi8u_LAfwCAHAlBgtcpXM43R-UZpv9hK3nsWjQHS6OPk7D3SpMTktrcZFD_s0XkJNM6I59lfzyjhV3bY2iGfCVNuNipXgAegEDo9q7RGsVJKjLzw9pBxpgEgaAW5sLF-mks5u8-qW-0VUyehh0g",
          },
        });
        this.todos = response.data;
      } catch (e) {
        alert("Ошибка");
      }
    },
  },
  mounted() {
    this.fetchTodos();
  },
};
</script>

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
#app {
  padding: 20px;
}
.label {
  margin-top: 15px;
}
</style>
