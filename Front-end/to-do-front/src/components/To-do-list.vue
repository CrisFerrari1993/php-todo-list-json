<script>
import axios from 'axios';

export default {
    name : 'To-do-list',
    data(){
        return {
            todos: []
        }
    },
    mounted() {
        const t = this;
        axios.get('http://localhost/todoApi.php')
             .then(res => {
                t.todos = res.data;
             }).catch(err => console.error(err));
    },
    methods: {
        togglePurchased(todo){
            todo.done = !todo.done;
        },
        deleteItem(todo){
            this.todos.splice(todo, 1);
        }
    },
}
</script>

<template>
<h1 v-if="todos.length == 0">
    Great Job, everything is done &#128526;
</h1>
<h1 v-else>ToDo List: {{ todos.length }} </h1>
<ul>
    <li
        v-for="(todo, index) in todos" :key="index"
        @click="togglePurchased(todo)"    
    >
        <span :class="[
            {strikeout: todo.done}
        ]">{{ todo.task }}</span> <i @click="deleteItem(index)" class="fa-solid fa-delete-left"></i>
    </li>
</ul>
</template>

<style>
    ul{
        margin: 0;
        padding: 0;
    }
    li{
        margin: 0.5rem 0;
        list-style: none;
        display: flex ;
        justify-content: space-between;
    }
    .strikeout{
        text-decoration: line-through;
    }
</style>