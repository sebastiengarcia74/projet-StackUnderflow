<template>
    <div class="registerForm">
    <form @submit.prevent="CreatePost">
        <div class="inputs">
            <div class="username">
                <input v-model="title" type="text" name="title" required class="input" placeholder="post title">
            </div>
            <div class="username">
                <input v-model="content" type="text" name="description" required class="input" placeholder="post content">
            </div>
            <div class="username">
                <input v-model="underflow" type="number" name="categorie" required class="input" placeholder="underflow id">
            </div>
            <div class="username">
                <input v-model="author" type="text" name="author" required class="input" placeholder="post author">
            </div>
            <div class="username">
                <input v-model="user" type="number" name="user" required class="input" placeholder="user id">
            </div>
            <div class="username">
                <input v-model="categorie" type="number" name="user" required class="input" placeholder="categorie id">
            </div>
            <div >
                <button type="submit" class="register" >Create Post</button>
            </div>
            <div >
                <button type="cancel" class="cancel" @click="$emit('closeCreatePost')">Cancel</button>
            </div>
            <div v-if="errorMessage">
                {{ errorMessage }}
            </div>
        </div>
        </form>
    </div>
</template>

<script setup>
  import { ref } from 'vue'
  import { useRouter } from 'vue-router'
//   import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
  
  const title = ref('')
  const content = ref('')
  const author = ref('')
  const underflow = ref('')
  const user = ref('')
  const categorie = ref('')
  const errorMessage = ref(null)
  const router = useRouter()
  
  async function CreatePost() {
    try {
      const response = await fetch('http://127.0.0.1:8000/api/post', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ post_title: title.value, post_content: content.value, underflow_id: underflow.value, post_author: author.value, user_id: user.value, categorie_id: categorie.value})
      })
      if (!response.ok) {
        const data = await response.json()
        errorMessage.value = data.message
      } else {
       location.reload();
      }
    } catch (error) {
      errorMessage.value = 'An error occurred while registering. Please try again later.'
      console.error(error)
    }
  }
  </script>

<style scoped>


.registerForm{
z-index: 100;
position: fixed;
width: 418px;
height: 67vh;
background:#CFAE81;
border-radius: 10px;
top: 138px;
right: 810px;
padding: 42px 0 0 92px;

}
.username {
width: 159px;
height: 37px;
left: 106px;
top: 10px;
margin: 15px

}
.inputs{
    display: flex;
    flex-direction: column;
}
.input {
background: #B49264;
border-radius: 22px;
}
.email {

width: 159px;
height: 37px;
left: 106px;
top: 70px;
margin: 15px
}
.password {
width: 159px;
height: 37px;
left: 106px;
top: 130px;
margin: 15px

}
.passwordverify {
width: 159px;
height: 37px;
left: 106px;
top: 190px;
margin: 15px

}
.dateofbirth {
width: 159px;
height: 37px;
left: 106px;
top: 250px;
margin: 15px

}
.register {

width: 225px;
height: 54px;
left: 106px;
top: 330px;
background: #50964E;
border-radius: 22px;  
margin: 15px;
margin-left: 7px;

}
.cancel {

width: 144px;
height: 44px;
left: 125px;
top: 450px;
background: #E72525;
border-radius: 22px;  
margin: 15px;
margin-left: 46px;

} 
</style>
  