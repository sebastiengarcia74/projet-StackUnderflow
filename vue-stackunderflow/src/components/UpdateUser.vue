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
                <div class="dateofbirth">
                    <input v-model="date_of_birth" type="text" name="date_of_birth" required class="input"
                        placeholder="date of birth">
                </div>
                <div>
                    <button type="submit" class="register" @click="updateUser(id)">Update</button>
                </div>
                <div>
                    <button type="cancel" class="cancel" @click="$emit('closeUpdate')">Cancel</button>
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

const name = ref('')
const email = ref('')
const date_of_birth = ref('')

async function updateUser(id) {

    fetch(('http://127.0.0.1:8000/api/admin/user/' + id), {
  method: 'PUT',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({
    name: name.value,
    email: email.value,
    date_of_birth: date_of_birth.value,  })
})
}

</script>