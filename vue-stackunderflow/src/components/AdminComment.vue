<template>
    <table>
        <thead>
            <th>Comment id</th>
            <th>Comment content</th>
            <th>Post id</th>
            <th>Comment author</th>
            <th>User id</th>
        </thead>
            <tbody>
                <tr v-for="(comment, index) in comments" :key="index">
                    <td>{{ comment.comment_id }}</td>
                    <td>{{ comment.comment_content }}</td>
                    <td>{{ comment.post_id }}</td>
                    <td>{{ comment.comment_author }}</td>
                    <td>{{ comment.user_id }}</td>
                    <td>
                        <button @click="deleteComment(comment.comment_id)">Delete</button>
                        <button @click="toggleShowUpdate(comment.comment_content)">Update</button>
                            <div v-if="showUpdate && commentSelect == comment.comment_content"  class="registerForm">
                                <div class="registerForm">
                                    <form @submit.prevent="register">
                                        <div>
                                            <div>
                                                <input v-model="newcontent" type="text" name="name" required :placeholder= "comment.comment_content">
                                            </div>
                                            <div>
                                                <input v-model="newpost" type="number" name="name" required :placeholder= "comment.post_id">
                                            </div>
                                            <div>
                                                <input v-model="newauthor" type="text" name="name" required :placeholder= "comment.comment_author">
                                            </div>
                                            <div>
                                                <input v-model="newuser" type="number" name="name" required :placeholder= "comment.user_id">
                                            </div>
                                            <div>
                                                <button type="submit" class="register" @click="updateComment(comment.comment_id)">Edit</button>
                                            </div>
                                            <div>
                                            <button type="cancel" class="cancel" @click="$emit('closeUpdate'), toggleShowUpdate(comment.comment_content)">Cancel</button>
                                            </div>
                                        
                                        </div>
                                    </form>
                                </div>
                            </div>

                    </td>
                </tr>
            </tbody>   
    </table> 
    <button @click="toggleShowCreate">Create Comment</button>
                <div v-if="showCreate" class="registerForm">
                <CreateComment @closeCreateComment="toggleShowCreate" />
                </div>   
</template>

<script setup>
import { ref } from 'vue';
import CreateComment from '../components/CreateComment.vue'

// fetch all comments
fetchData()

let comments = ref([])

async function fetchData() { fetch('http://127.0.0.1:8000/api/admin/comments')
.then(response => response.json())
.then(data => comments.value = data)

}

// fonction delete
async function deleteComment(comment_id)  {      
fetch(('http://127.0.0.1:8000/api/admin/comment/' + comment_id), {
    method: 'DELETE',
})
setTimeout(() => {
fetchData();
console.log('5 secondes');
}, 20);
console.log(`Deleted comment with ID ${comment_id}`);

};

//fonction update


let showUpdate = ref(false);
let commentSelect = ref("");

function toggleShowUpdate(comment) {
commentSelect.value = comment;
showUpdate.value = !showUpdate.value; 

}

let showCreate = ref(false)

function toggleShowCreate() {
showCreate.value = !showCreate.value;
console.log(showCreate.value);
}

let newcontent = ref('')
let newpost = ref('')
let newauthor = ref('')
let newuser = ref('')

async function updateComment(comment_id) {

fetch(('http://127.0.0.1:8000/api/admin/comment/' + comment_id), {
method: 'PUT',
headers: {
'Content-Type': 'application/json'
},
body: JSON.stringify({
comment_content: newcontent.value, post_id: newpost.value, comment_author: newauthor.value, user_id: newuser.value})
})

setTimeout(() => {
fetchData();
console.log('5 secondes');
}, 20);
console.log(`updated comment with ID ${comment_id}`);

}
</script>