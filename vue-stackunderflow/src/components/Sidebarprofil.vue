<template>
    <div class="sidebar">
      <a href="/">Home</a>
        <p>Favories</p>
        <p>All</p>
        <span>________________________</span>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
*,
 ::before,
 ::after {
   box-sizing: border-box;
   margin: 0;
   padding: 0;
 }
.sidebar {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  position: relative;
  width: 200px;
  height: 800px;
    color: #0b0b0b;
    background-color: #ebcda1d1;
    padding: 20px;
    /* box-shadow:0 2px 4px 0 #050505; */
    
 } 
 .sidebar p {
    padding: 5px;
 }
 .sidebar a {
    padding: 5px;
 }
 .sidebar span {
    color: #6FBC6D;
 }
 @media(max-width: 500px) {
                .sidebar {
                   width: 150px;
                   height: 1400px;
                  }
                  .sidebar span {
                    /* display: none; */
                    font-size: 12px;
                } 
               } 
</style>