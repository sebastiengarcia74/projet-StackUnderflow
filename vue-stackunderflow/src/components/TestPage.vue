<template>
    <h1>Test integration modal</h1>
        <button @click="toggleShowRegister">Show register modal</button>
            <div  v-if="showRegister">
                <Register />
            </div>    
</template>

<script setup>
import Register from '../components/Register.vue'

import { ref } from 'vue'

let showRegister = ref(false)
function toggleShowRegister() {
    showRegister.value = !showRegister.value;
    console.log(showRegister);
} 
</script>