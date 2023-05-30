<template>
    <table>
        <thead>
            <th>Underflow id</th>
            <th>Underflow title</th>
            <th>Underflow description</th>
            <th>Category id</th>
            <th>Underflow author</th>
            <th>User id</th>
        </thead>
            <tbody>
                <tr v-for="(underflow, index) in underflows" :key="index">
                    <td>{{ underflow.underflow_id }}</td>
                    <td>{{ underflow.underflow_title }}</td>
                    <td>{{ underflow.underflow_description }}</td>
                    <td>{{ underflow.categorie_id }}</td>
                    <td>{{ underflow.underflow_author }}</td>
                    <td>{{ underflow.user_id }}</td>
                    <td>
                        <button @click="deleteUnderflow(underflow.underflow_id)">Delete</button>
                        <button @click="toggleShowUpdate(underflow.underflow_title)">Update</button>
                            <div v-if="showUpdate && underflowSelect == underflow.underflow_title"  class="registerForm">
                                <div class="registerForm">
                                    <form @submit.prevent="register">
                                        <div>
                                            <div>
                                                <input v-model="newtitle" type="text" name="name" required :placeholder= "underflow.underflow_title">
                                            </div>
                                            <div>
                                                <input v-model="newdescription" type="text" name="name" required :placeholder= "underflow.underflow_description">
                                            </div>
                                            <div>
                                                <input v-model="newcategorie" type="number" name="name" required :placeholder= "underflow.categorie_id">
                                            </div>
                                            <div>
                                                <input v-model="newauthor" type="text" name="name" required :placeholder= "underflow.underflow_author">
                                            </div>
                                            <div>
                                                <input v-model="newuser" type="number" name="name" required :placeholder= "underflow.user_id">
                                            </div>
                                            <div>
                                                <button type="submit" class="register" @click="updateUnderflow(underflow.underflow_id)">Edit</button>
                                            </div>
                                            <div>
                                            <button type="cancel" class="cancel" @click="$emit('closeUpdate'), toggleShowUpdate(underflow.underflow_title)">Cancel</button>
                                            </div>
                                         
                                         </div>
                                    </form>
                                </div>
                            </div>

                    </td>
                </tr>
            </tbody>   
    </table> 
    <button @click="toggleShowCreate">Create Underflow</button>
                  <div v-if="showCreate" class="registerForm">
                  <CreateUnderflow @closeCreateUnderflow="toggleShowCreate" />
                  </div>   
</template>

<script setup>
import { ref } from 'vue';
import CreateUnderflow from '../components/CreateUnderflow.vue'

// fetch all underflow
fetchData()

let underflows = ref([])

async function fetchData() { fetch('http://127.0.0.1:8000/api/admin/underflows')
    .then(response => response.json())
    .then(data => underflows.value = data)
    
}

// fonction delete
async function deleteUnderflow(underflow_id)  {      
    fetch(('http://127.0.0.1:8000/api/admin/underflow/' + underflow_id), {
        method: 'DELETE',
    })
    setTimeout(() => {
    fetchData();
    console.log('5 secondes');
    }, 20);
    console.log(`Deleted underflow with ID ${underflow_id}`);
  
};

//fonction update


let showUpdate = ref(false);
let underflowSelect = ref("");

function toggleShowUpdate(underflow) {
  underflowSelect.value = underflow;
  showUpdate.value = !showUpdate.value; 

}

let showCreate = ref(false)

function toggleShowCreate() {
    showCreate.value = !showCreate.value;
    console.log(showCreate.value);
}

let newtitle = ref('');
let newdescription = ref('')
let newcategorie = ref('')
let newauthor = ref('')
let newuser = ref('')

async function updateUnderflow(underflow_id) {

    fetch(('http://127.0.0.1:8000/api/admin/underflow/' + underflow_id), {
  method: 'PUT',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({
    underflow_title: newtitle.value, underflow_description: newdescription.value, categorie_id: newcategorie.value, underflow_author: newauthor.value, user_id: newuser.value})
})

setTimeout(() => {
    fetchData();
    console.log('5 secondes');
    }, 20);
    console.log(`updated underflow with ID ${underflow_id}`);
  
}
</script>