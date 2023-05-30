<template>
  
  <div class="loginForm">
    <form @submit.prevent="login">
      <div class="inputs">
        <div class="email">
          <input v-model="email" type="email" name="email" required class="input" placeholder="email">
        </div>
        <div class="password">
          <input v-model="password" type="password" name="password" required class="input" placeholder="password">
      </div>
        <div>
          <button type="submit" class="register">Login</button>
        </div>
        <div>
          <button type="submit" class="register" @click="$emit('closeLogin')">Cancel</button>
        </div>
        <div v-if="errorMessage">
          {{ errorMessage }}
        </div>
      </div>  
    </form>
  </div>  
</template>
  
  <script setup>
  // import 'bootstrap/dist/css/bootstrap.css'
  // import 'bootstrap-vue/dist/bootstrap-vue.css'
  import { ref } from 'vue'
  import { useRouter } from 'vue-router'
  import { defineEmits } from 'vue'
  // import Vue from 'vue'
  // import VueCookies from 'vue-cookies'
  
  
  const email = ref('')
  const password = ref('')
  const errorMessage = ref(null)
  
  const router = useRouter()
  const emit = defineEmits(['submit'])

  function setCookie(name, value) {

    document.cookie = name + "=" + value;
  }
//   Vue.use(VueCookies, { 
//   // options here
// })
  
  async function login() {
    try {
      await fetch('http://127.0.0.1:8000/api/auth/login', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email: email.value, password: password.value })
      })
      .then(response => response.json())
        .then(data => {
         const token = data.token;
         const username = data.username
        console.log(token);
        console.log(data);
        // $cookies.set(cookietoken, token)

        setCookie('cookieseb', token);
        console.log("COUCOU")
      emit('submit',username);
      
      router.push('/')


        })

      
    } catch (error) {
      errorMessage.value = 'An error occurred while logging in. Please try again later.'
      console.error(error)
    }

   
  }
  </script>
  <style scoped>
 .loginForm{
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