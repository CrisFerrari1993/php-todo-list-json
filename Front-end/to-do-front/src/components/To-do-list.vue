<script>
import axios from 'axios';

export default {
    name : 'To-do-list',
data(){
        return {
            todos: [],
            newItem: "",
        }
    },
    mounted() {
        const t = this;
        axios.get('http://localhost/todoApi.php')
             .then(res => {
                t.todos = res.data;
             }).catch(err => console.log(err));
    },
    methods: {
        addItem(){

            const t = this;
            const params = {
                text : this.newItem,
            };
            const config = {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            };
            axios.post('http://localhost/addItem.php', params, config)
                 .then(res => {
                    t.todos = res.data;
                    t.newItem = "";
                 }).catch(err => console.log(err));
        },
        deleteItem(index){
            
            const t = this;
            const params = {
                params: {
                    index : index
                }
            };
            axios.get('http://localhost/deleteItem.php', params)
            .then(res => {
                t.todos = res.data;
            }).catch(err => console.log(err));
        },
        toggleDone(todo){
            todo.done = !todo.done;
        }
    },
}
</script>

<template>
    <div>
        <h1  v-if="todos.length > 0"> ToDo list : {{ todos.length }}</h1>
        <div v-else>
            <h1>Great job! Everything is done &#128526;</h1>
            <span>Add to list somethings you wants to do</span>
        </div>
        <form @submit.prevent="addItem">
            <input type="text" name="text" v-model="newItem">
            <input
                type="submit"
                :disabled="newItem.length === 0"
                value="Add Task">
            <br>
        </form>
        <ul>
            <li
                v-for="(todo, index) in todos" :key="index"

            >
                <span 
                @click="toggleDone(todo)"
                :class="[
                {strikeout: todo.done}
                ]">
                        {{ todo.task }}
                </span>
                <button @click="deleteItem(index)"><i class="fa-regular fa-trash-can"></i></button>
            </li>
        </ul>
    </div>
</template>

<style>
input{
    margin-top: 2rem;
}
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