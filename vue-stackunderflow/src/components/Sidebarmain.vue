<template>
    <div class="sidebar">
      <div>categorie 1</div>
      <div>categorie 2</div>
      <div>categorie 3</div>
    </div>
</template>

<script setup>
</script>

<style scoped>
*,
 ::before,
 ::after {
   box-sizing: border-box;
   margin: 0;
   padding: 0;
 }
 body {
  background: #B49264;
 }
.sidebar {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  position: absolute;
  display: flex;
  flex-direction: column;
  /* justify-content: center; */
  width: 180px;
  height: 710px;
    color: #0b0b0b;
    background-color: #ebcda1d1;
    padding: 5px;
    
    
 } 
 .sidebar button {
    padding: 25px;
    margin: 5px;
 }
 .sidebar span {
  color: #6FBC6D;
  margin: 0 0 20px 5px;
  padding: 5px;
 }
 .post {
  border: transparent;
  background: #B49264;
  box-shadow: 0px 1px 3px rgb(232, 167, 93);
 }
</style>