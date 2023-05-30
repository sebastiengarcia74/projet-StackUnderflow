<template>

    <div class="registerForm">
    <form @submit.prevent="register">
        <div class="inputs">
            <div class="username">
                <input v-model="name" type="text" name="name" required class="input" placeholder="name">
            </div>
            <div class="email">
                <input v-model="email" type="email" name="email" required class="input" placeholder="email">
            </div>
            <div class="password">
                <input v-model="password" type="password" name="password" required class="input" placeholder="password">
            </div>
            <div class="passwordverify">
                <input v-model="passwordverify" type="password" name="password" required class="input" placeholder="passwordverify">
            </div>
            <div class="dateofbirth">
                <input v-model="date_of_birth" type="text" name="date_of_birth" required class="input" placeholder="date of birth">
            </div>
            <div class="isadmin">
                <input v-model="is_admin" type="text" name="date_of_birth" required class="input" placeholder="admin">
            </div>
            <div >
                <button type="submit" class="register" >Register</button>
            </div>
            <div >
                <button type="cancel" class="cancel" @click="$emit('closeRegister')">Cancel</button>
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
  
  const name = ref('')
  const email = ref('')
  const password = ref('')
  const date_of_birth = ref('')
  const is_admin = ref('')
  const errorMessage = ref(null)
  const router = useRouter()
  
  async function register() {
    try {
      const response = await fetch('http://127.0.0.1:8000/api/auth/register', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name: name.value, email: email.value, password: password.value, date_of_birth: date_of_birth.value, is_admin: is_admin.value})
      })
      if (!response.ok) {
        const data = await response.json()
        errorMessage.value = data.message
      } else {
        // Registration successful, redirect to login page
        router.push('/')
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

.isadmin {
width: 159px;
height: 37px;
left: 106px;
top: 310px;
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
  