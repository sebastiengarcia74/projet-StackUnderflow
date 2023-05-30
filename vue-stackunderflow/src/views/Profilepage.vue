<template>
    <Navbar></Navbar>
    <div class="profilcontainer">
      <sidebarprofil></sidebarprofil>
      <div class="displaypost">
        <img src="../components/icons/sachapokemon.jpg" class="imgpost">
        <button class="Post">Posttttt</button>
        <button class="Post">Posttt</button>
        <button class="Post">Postt</button>


      </div>
      
      <div class="card">
        
        <profilcard></profilcard>
      </div>
   </div>
  <Buttonup></Buttonup>
</template>

<script>
import Buttonup from '../components/Buttonup.vue';
import Navbar from '../components/Navbar.vue';
import Profilcard from '../components/Profilcard.vue';
import Sidebarprofil from '../components/Sidebarprofil.vue';
export default {
  components: { Navbar, Sidebarprofil, Profilcard, Buttonup },
}
</script>

<style scoped>
.profilcontainer {
  display: flex;
}
.displaypost {
  display: flex;
  flex-direction: column;
  
  
}
.imgpost {
  padding: 0%;
  margin: 20px;
  position: relative;
  object-fit: cover;
  border: 2px solid #0a0a0a;
  top: 100px;
  width: 600px;
  height: 150px;
  font-size: 50px;
}
.Post {
  padding: 0%;
  margin: 20px;
  position: relative;
  background: #B49264;
  top: 100px;
  width: 600px;
  height: 150px;
  font-size: 50px;
}
.card {
  position: fixed;
  top: 100px;
  right: 10px;
}
@media(max-width: 500px) {
                .card {
                   width: 400px;
                   height: 400px;
                  }
                }   
</style>