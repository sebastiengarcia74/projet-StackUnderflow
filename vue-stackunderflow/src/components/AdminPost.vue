<template>
    <table>
        <thead>
            <th>Post id</th>
            <th>Post title</th>
            <th>Post content</th>
            <th>Underflow id</th>
            <th>Post author</th>
            <th>User id</th>
            <th>Categorie id</th>
        </thead>
            <tbody>
                <tr v-for="(post, index) in posts" :key="index">
                    <td>{{ post.post_id }}</td>
                    <td>{{ post.post_title }}</td>
                    <td>{{ post.post_content }}</td>
                    <td>{{ post.underflow_id }}</td>
                    <td>{{ post.post_author }}</td>
                    <td>{{ post.user_id }}</td>
                    <td>{{ post.categorie_id }}</td>
                    <td>
                        <button @click="deletePost(post.post_id)">Delete</button>
                        <button @click="toggleShowUpdate(post.post_title)">Update</button>
                            <div v-if="showUpdate && postSelect == post.post_title"  class="registerForm">
                                <div class="registerForm">
                                    <form @submit.prevent="register">
                                        <div>
                                            <div>
                                                <input v-model="newtitle" type="text" name="name" required :placeholder= "post.post_title">
                                            </div>
                                            <div>
                                                <input v-model="newcontent" type="text" name="name" required :placeholder= "post.post_content">
                                            </div>
                                            <div>
                                                <input v-model="newunderflow" type="number" name="name" required :placeholder= "post.underflow_id">
                                            </div>
                                            <div>
                                                <input v-model="newauthor" type="text" name="name" required :placeholder= "post.post_author">
                                            </div>
                                            <div>
                                                <input v-model="newuser" type="number" name="name" required :placeholder= "post.user_id">
                                            </div>
                                            <div>
                                                <input v-model="newcategorie" type="number" name="name" required :placeholder= "post.categorie_id">
                                            </div>
                                            <div>
                                                <button type="submit" class="register" @click="updatePost(post.post_id)">Edit</button>
                                            </div>
                                            <div>
                                            <button type="cancel" class="cancel" @click="$emit('closeUpdate'), toggleShowUpdate(post.post_title) ">Cancel</button>
                                            </div>
                                        
                                        </div>
                                    </form>
                                </div>
                            </div>

                    </td>
                </tr>
            </tbody>   
    </table> 
    <button @click="toggleShowCreate">Create Post</button>
                <div v-if="showCreate" class="registerForm">
                <CreatePost @closeCreatePost="toggleShowCreate" />
                </div>   
</template>

<script setup>
import { ref } from 'vue';
import CreatePost from '../components/CreatePost.vue'

// fetch all post
fetchData()

let posts = ref([])

async function fetchData() { fetch('http://127.0.0.1:8000/api/admin/posts')
.then(response => response.json())
.then(data => posts.value = data)

}

// fonction delete
async function deletePost(post_id)  {      
fetch(('http://127.0.0.1:8000/api/admin/post/' + post_id), {
    method: 'DELETE',
})
setTimeout(() => {
fetchData();
console.log('5 secondes');
}, 20);
console.log(`Deleted post with ID ${post_id}`);

};

//fonction update


let showUpdate = ref(false);
let postSelect = ref("");

function toggleShowUpdate(post) {
postSelect.value = post;
showUpdate.value = !showUpdate.value; 

}

let showCreate = ref(false)

function toggleShowCreate() {
showCreate.value = !showCreate.value;
console.log(showCreate.value);
}

let newtitle = ref('');
let newcontent = ref('')
let newunderflow = ref('')
let newauthor = ref('')
let newuser = ref('')
let newcategorie = ref('')

async function updatePost(post_id) {

fetch(('http://127.0.0.1:8000/api/admin/post/' + post_id), {
method: 'PUT',
headers: {
'Content-Type': 'application/json'
},
body: JSON.stringify({
post_title: newtitle.value, post_content: newcontent.value, underflow_id: newunderflow.value, post_author: newauthor.value, user_id: newuser.value, categorie_id: newcategorie.value})
})

setTimeout(() => {
fetchData();
console.log('5 secondes');
}, 20);
console.log(`updated post with ID ${post_id}`);

}
</script>