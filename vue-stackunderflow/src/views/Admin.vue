<template>

    <Navbar></Navbar>
    <div class="crudbar">
        <button @click="toggleShowUser">Crud User</button>
        <button @click="toggleShowCategorie">Crud Categorie</button>
        <button @click="toggleShowUnderflow">Crud Underflow</button>
        <button @click="toggleShowPost">Crud Post</button>
        <button @click="toggleShowComment">Crud Comment</button>
    </div>
    
    <AdminUsers v-if="showUser"></AdminUsers>
    <AdminCategories v-if="showCategorie"></AdminCategories>
    <AdminUnderflow v-if="showUnderflow"></AdminUnderflow>
    <AdminPost v-if="showPost"></AdminPost>
    <AdminComment v-if="showComment"></AdminComment>


</template>

<script setup>
import Navbar from '../components/Navbar.vue';
import Sidebarmain from '../components/Sidebarmain.vue';
import AdminUsers from '../components/AdminUsers.vue'
import AdminCategories from '../components/AdminCategories.vue'
import AdminUnderflow from '../components/AdminUnderflow.vue'
import AdminPost from '../components/AdminPost.vue'
import AdminComment from '../components/AdminComment.vue'
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
import { ref } from 'vue';

let showUser = ref(false)
function toggleShowUser() {
    showUser.value = !showUser.value
}

let showCategorie = ref(false)
function toggleShowCategorie() {
    showCategorie.value = !showCategorie.value
}

let showUnderflow = ref(false)
function toggleShowUnderflow() {
    showUnderflow.value = !showUnderflow.value
}

let showPost = ref(false)
function toggleShowPost() {
    showPost.value = !showPost.value
}

let showComment = ref(false)
function toggleShowComment() {
    showComment.value = !showComment.value
}

</script>

<style scoped>

.crudbar {
    position: relative;
                         width: 100%;
                         display: flex;
                         align-items: center;
                         padding: 15px 25px;
                         background: #CFAE81;
                         box-shadow: inset 0px -1px 0px #c5c5c6;
}
.btn-group button {
  background-color: #04AA6D; /* Green background */
  border: 1px solid green; /* Green border */
  color: white; /* White text */
  padding: 10px 24px; /* Some padding */
  cursor: pointer; /* Pointer/hand icon */
  width: 50%; /* Set a width if needed */
  display: block; /* Make the buttons appear below each other */
}

.btn-group button:not(:last-child) {
  border-bottom: none; /* Prevent double borders */
}

/* Add a background color on hover */
.btn-group button:hover {
  background-color: #3e8e41;
}

</style>