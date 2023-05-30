<template>
  <button class="up">Back to Top</button>
  <img src="./icons/arrow-up.svg" alt="arrowup" class="arrow">
  
</template>

<script>
export default {

}
</script>

<style scoped>
.up {
    position: fixed;
    bottom: 20px;
    right: 20px;
    border: transparent;
    border-radius: 20px;
    font-size: 18px;
    height: 40px;
    width: 150px;
    background: #50964E;
    box-shadow: 0px 1px 3px rgb(232, 167, 93);
    color: aliceblue;
    text-align: center;
    padding:  8px 30px 30px 10px;
    
    
 }
 .arrow {
    position: fixed;
    bottom: 30px;
    right: 30px;
    
    width: 25px;
    height: 25px;
    
 }
</style>