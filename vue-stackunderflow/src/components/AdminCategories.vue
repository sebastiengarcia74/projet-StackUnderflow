<template>
    <table>
        <thead>
            <th>Category Id</th>
            <th>Category Name</th>
        </thead>
            <tbody>
                <tr v-for="(category, index) in categories" :key="index">
                    <td>{{ category.categorie_id }}</td>
                    <td>{{ category.categorie_title }}</td>
                    <td>
                        <button @click="deleteCategory(category.categorie_id)">Delete</button>
                        <button @click="toggleShowUpdate(category.categorie_title)">Update</button>
                            <div v-if="showUpdate && categorySelect == category.categorie_title"  class="registerForm">
                                <div class="registerForm">
                                    <form @submit.prevent="register">
                                        <div>
                                            <div>
                                                <input v-model="newtitle" type="text" name="name" required :placeholder= "category.categorie_title">
                                            </div>
                                            <div>
                                                <button type="submit" class="register" @click="updateCategory(category.categorie_id)">Edit</button>
                                            </div>
                                            <div>
                                            <button type="cancel" class="cancel" @click="$emit('closeUpdate'), toggleShowUpdate(category.categorie_title)">Cancel</button>
                                            </div>
                                         
                                         </div>
                                    </form>
                                </div>
                            </div>

                    </td>
                </tr>
            </tbody>   
    </table> 
    <button @click="toggleShowCreate">Create Category</button>
                  <div v-if="showCreate" class="registerForm">
                  <CreateCategory @closeCreateCategory="toggleShowCreate" />
                  </div>   
</template>

<script setup>
import { ref } from 'vue';
import CreateCategory from '../components/CreateCategory.vue'

// fetch all categories
fetchData()

let categories = ref([])

async function fetchData() { fetch('http://127.0.0.1:8000/api/admin/categories')
    .then(response => response.json())
    .then(data => categories.value = data)
    
}

// fonction delete
async function deleteCategory(categorie_id)  {      
    fetch(('http://127.0.0.1:8000/api/admin/categorie/' + categorie_id), {
        method: 'DELETE',
    })
    setTimeout(() => {
    fetchData();
    console.log('5 secondes');
    }, 20);
    console.log(`Deleted category with ID ${categorie_id}`);
  
};

//fonction update


let showUpdate = ref(false);
let categorySelect = ref("");

function toggleShowUpdate(category) {
  categorySelect.value = category;
  showUpdate.value = !showUpdate.value; 

}

// function create category

let showCreate = ref(false)

function toggleShowCreate() {
    showCreate.value = !showCreate.value;
    console.log(showCreate.value);
}

let newtitle = ref('')

async function updateCategory(categorie_id) {

    fetch(('http://127.0.0.1:8000/api/admin/categorie/' + categorie_id), {
  method: 'PUT',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({
    categorie_title: newtitle.value })
})

setTimeout(() => {
    fetchData();
    console.log('5 secondes');
    }, 20);
    console.log(`updated category with ID ${id}`);
  
}
</script>