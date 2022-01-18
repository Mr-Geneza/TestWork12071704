<template>
  <div v-if="todos.length > 0">
    <h3>Todos</h3>
    <todo-item
      v-for="todo in todos"
      :todo="todo"
      :key="todo.id"
		@remove="$emit('remove', todo)"
    />
  </div>
  <h2 v-else style="color: red">Haven't todos...</h2>
</template>

<script>
import TodoItem from "./TodoItem.vue";
export default {
  components: { TodoItem },
  props: {
    todos: {
      type: Array,
      required: true,
    },
  },
};
</script>

<style scoped>
</style>