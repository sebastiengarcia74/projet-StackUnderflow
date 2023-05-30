<template>
<Navbar></Navbar>
<div class="ow d-flex align-items-center justify-content-left" style="margin-top: 50px; margin-left: 50px;"><img style="width: 100px;" src="../components/icons/flame.svg" alt="populary"><h1>Most Popular</h1></div>              
<div  v-for="post in allPosts">
<div  class="container mt-5 mb-5 w-100">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="d-flex justify-content-between p-2 px-3">
                        <div class="d-flex flex-column ml-2"> <span class="font-weight-light">u/GamingLaptops</span> <small class="font-weight-bold">{{ post.post_title }}</small> </div>
                </div> 
                <div class="p-2">
                  <span :id="'commentCounter'+post.post_id">  {{ NumberOfCommentsByPostId(post.post_id)  }} comments</span>
                    <hr>
                    <div v-for="comment in allComments" >
                    <div v-if="comment.post_id === post.post_id">
                    <div class="comments">
                        <div class="d-flex flex-row mb-4"> <img src="https://tinyurl.com/4pmp88av" width="60" class="rounded-image">
                            <div class="d-flex flex-column ml-2"> <span class="name">{{ comment.comment_author }}</span> <small class="comment-text">{{ comment.comment_content }}</small>
                                <div class="d-flex flex-row align-items-center status"> <small class="mr-2">Like</small> <small class="mr-2">Reply</small> <small class="text-danger" @click="deleteComment(comment.comment_id)">Delete</small> </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
              </div>
              <div> <input type="text" placeholder="Write Comment" class="form-control" v-model="commentContents[post.post_id]" ><button class="btn btn-primary mt-1"  @click="addComment(commentContents[post.post_id],post.post_id)">send</button></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</template>

<script setup>
import Navbar from '../components/Navbar.vue' ;
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
import { ref } from 'vue';
const allPosts = ref([]);
const allComments = ref([]);
const commentContents = ref([])

function fetchComments() {
  fetch("http://127.0.0.1:8000/api/admin/comments/")
.then(res => res.json())
.then(data => allComments.value = data)
}
fetchComments();

function NumberOfCommentsByPostId($id) {
 fetch("http://127.0.0.1:8000/api/admin/commentCountByPost/"+$id)
 .then(res => res.json())
 .then(data => {
  document.getElementById("commentCounter"+$id).innerHTML = data + " comments";
    });
}


function fetchData() {
  fetch("http://127.0.0.1:8000/api/admin/posts")
.then(res => res.json())
.then(data => allPosts.value = data);
}
fetchData();

function addComment(content, post_id) {
  fetch('http://127.0.0.1:8000/api/comment', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ 
      comment_content: content,
      post_id: post_id,
      comment_author: "kieran",
      user_id: 1 // normalement ca sera selon l'id de la user sesson en cours, a voir quand on aura implementé les sessions start
    })
  }).then(fetchComments)
  .then(() => {
      commentContents.value[post_id] = ''; 
  })
}

function deleteComment(post_id) {
  fetch('http://127.0.0.1:8000/api/admin/comment/'+post_id ,{
    method: 'DELETE',
    headers: {
      'Content-Type': 'application/json'
    }
  }).then(fetchComments)
 
}


</script>

<style>

</style>