<template>
  <table>
      <thead>
          <th>Name</th>
          <th>Email</th>
          <th>Date Of Birth</th>
          <th>Admin</th>
        </thead>
        <tbody>
                              <tr v-for="(user, index) in users" :key="index" class="note" >
                                  <td>{{ user.name }}</td>
                                  <td>{{ user.email }}</td>
                                  <td>{{ user.date_of_birth }}</td>
                                  <td>{{ user.is_admin }}</td>
                                  <td>
                                      <button @click="deleteUser(user.id)" class="deletebutton">Delete</button>
              <button @click="toggleShowUpdate(user.name) " class="updatebutton">Update</button>
              <div v-if="showUpdate && userSelect == user.name"  class="registerForm">
                <div class="registerForm">
                  <form @submit.prevent="register">
                    <div class="inputs">
                    <div class="username">
                      <input v-model="newname" type="text" name="name" required class="input" :placeholder= "user.name">
                  </div>
                  <div class="email">
                      <input v-model="newemail" type="email" name="email" required class="input" :placeholder= "user.email">
                  </div>
                  <div class="dateofbirth">
                      <input v-model="newdate_of_birth" type="text" name="date_of_birth" required class="input" :placeholder= "user.date_of_birth">
                  </div>
                  <div class="isadmin">
                  <input v-model="is_admin" type="text" name="date_of_birth" required class="input" placeholder="admin">
                  </div>
                  <div>
                      <button type="submit" class="register" @click="updateUser(user.id)">Edit</button>
                  </div>
                  <div>
                      <button type="cancel" class="cancel" @click="$emit('closeUpdate'), toggleShowUpdate(user.name) ">Cancel</button>
                  </div>
                  <div v-if="errorMessage">
                      {{ errorMessage }}
                  </div>
                  </div>
                  </form>
                </div>
              </div>
                                  </td>
                              </tr>
  
                      </tbody>
  </table>
  <button @click="toggleShowRegister">Create User</button>
                  <div v-if="showRegister" class="registerForm">
                  <CreateUser @closeRegister="toggleShowRegister" />
                  </div>
    </template>

<script setup>
import { ref } from 'vue';
import Register from '../components/Register.vue'
import UpdateUser from '../components/UpdateUser.vue'
import CreateUser from '../components/CreateUser.vue'

fetchData()
let users = ref([])

// fetch all users

async function fetchData() { fetch('http://127.0.0.1:8000/api/admin/users')
    .then(response => response.json())
    .then(data => users.value = data)
}
// fonction delete
async function deleteUser(id)  {      
    fetch(('http://127.0.0.1:8000/api/admin/user/' + id), {
        method: 'DELETE',
    })
    setTimeout(() => {
    fetchData();
    console.log('5 secondes');
    }, 20);
    console.log(`Deleted user with ID ${id}`);
  
};



//fonction update


let showUpdate = ref(false);
let userSelect = ref("");
// let userToEdit = ref("");

function toggleShowUpdate(user) {
  userSelect.value = user;
  showUpdate.value = !showUpdate.value; 
  // userToEdit = userName; 

}

let newname = ref('')
let newemail = ref('')
let newdate_of_birth = ref('')
let is_admin = ref('')

async function updateUser(id) {

    fetch(('http://127.0.0.1:8000/api/admin/user/' + id), {
  method: 'PUT',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({
    name: newname.value,
    email: newemail.value,
    date_of_birth: newdate_of_birth.value,
    is_admin: is_admin.value
  
  })
})

setTimeout(() => {
    fetchData();
    console.log('5 secondes');
    }, 20);
    console.log(`updated user with ID ${id}`);
  
}

let showRegister = ref(false)

function toggleShowRegister() {
    showRegister.value = !showRegister.value;
    console.log(showRegister.value);
}



</script>