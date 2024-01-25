<script>
import axios from 'axios';

export default {
    name : 'To-do-list',
    data(){
        return {
            todos: [],
            newItem: "",
            editing: false,
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
        toggleDone(todo){
            todo.done = !todo.done;
        },
        deleteItem(todo){
            this.todos.splice(todo, 1);
        },
        addItem(){
            this.todos.push({'task' : this.newItem});
            this.newItem = '';
        },
    },
}
</script>

<template>
    <div v-if="todos.length == 0">
        <h1>
            Great Job, everything is done &#128526;
        </h1>
        <input @keyup.enter="addItem" type="text" v-model="newItem">
        <button 
            @click="addItem"
            :disabled="newItem.length === 0">
             Add Task
        </button>
    </div>
    <div v-else>
        <h1> ToDo list : {{ todos.length }}</h1>
        <input @keyup.enter="addItem" type="text" v-model="newItem">
        <button 
            @click="addItem"
            :disabled="newItem.length === 0">
                Add Task
        </button>
        <ul>
            <li
                v-for="(todo, index) in todos" :key="index"

            >
                <span 
                @click="toggleDone(todo)"
                :class="[
                {strikeout: todo.done}
                ]">{{ todo.task }}</span> <i @click="deleteItem(index)" class="fa-solid fa-delete-left"></i>
            </li>
        </ul>
    </div>
</template>

<style>
    ul{
        margin: 2rem 0;
        padding: 0;
    }
    li{
        margin: 0.5rem 0;
        list-style: none;
        display: flex ;
        justify-content: space-between;
        cursor: pointer;
    }
    .strikeout{
        text-decoration: line-through;
        color: gray;
    }
</style>