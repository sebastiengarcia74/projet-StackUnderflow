<template>
    <header>
         <nav>
 
             <a href="#" class="nav-icon" aria-label="visit homepage" aria-current="page">
               <img src="./icons/logostackunderflow.png" alt="logostackunderflow">
               <span>Stack Under Flow</span>
             </a>
       
             <div class="main-navlinks">
               
               <div class="searchcontainer">
                 <img src="./icons/search-outline.svg" alt="search" class="iconsearch">
                 
                  <form method="get" action="searchbar.php">             <!-- change avec laravel -->
                     <input type="search" name="searchbar" id="sbar"
                     placeholder="name, category, ..." >
                   <button type="submit">Search</button>
                 </form>
           
               </div>
            
             </div>
       
             <div class="nav-authentication">
               <a href="#" class="sign-user" aria-label="Sign in page">
                 <img src="./icons/person-outline.svg" alt="user-icon">
               </a>
               <div class="sign-btns" v-if="userEmail == undefined">
                 <button @click="toggleShowLogin">Login</button>
                 <button @click="toggleShowRegister">Register</button>
                  <div v-if="showRegister" class="registerForm">
                  <Register @closeRegister="toggleShowRegister" />
                  </div>
                  <div v-if="showLogin" class="registerForm">
                  <Login @closeLogin="toggleShowLogin" @submit="displayEmail" />
                  </div>
                </div>
                <div v-else>{{ userEmail }}</div>    
               
             </div>
           </nav>
     </header>
 </template>
 
 <script setup>
import Register from '../components/Register.vue'
import Login from '../components/Login.vue'

import { ref } from 'vue'

let showRegister = ref(false)

function toggleShowRegister() {
    showRegister.value = !showRegister.value;
    console.log(showRegister.value);
}

let showLogin = ref(false)
let userEmail = ref(undefined)

function displayEmail(email) {
  console.log(email)
    userEmail.value = email
    toggleShowLogin()

}

function toggleShowLogin() {
  showLogin.value = !showLogin.value;
    
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
 
                       /*  nav en haut   */
 
 
                       nav {
                         position: relative;
                         width: 100%;
                         display: flex;
                         align-items: center;
                         padding: 15px 25px;
                         background: #CFAE81;
                         box-shadow: inset 0px -1px 0px #c5c5c6;
                       }
                       
                       .nav-icon {
                         display: flex;
                         align-items: center;
                         text-decoration: none;
                         margin-right: 20px;
                       }
                       
                       .nav-icon span {
                         font-family: Roboto Flex, sans-serif;
                         font-size: 25px;
                         margin-left: 10px;
                         font-weight: 400;
                         color: #333;
                       }
                       .nav-icon img {
                         width: 40px;
                         transform: rotate(-17deg) translateX(5px);
                       }
                       
                       .navlinks-container {
                         position: absolute;
                         display: inline-block;
                         bottom: 25px;
                         left: 1300px;
                         width: 25px;
                         height: 25px;
                         
                       }
                       .navlinks-container a {
                         margin: 0 10px;
                         font-family: Roboto Flex, sans-serif;
                         font-size: 18px;
                         font-weight: 500;
                         text-decoration: none;
                         
                         
                         color: #414141;
                         display: inline-block;
                         position: absolute;
                       }
                       .navlinks-container a::after {
                         content: "";
                         display: block;
                         position: absolute;
                         bottom: -3px;
                         width: 100%;
                         height: 1px;
                         transform: scaleX(0);
                         transform-origin: left;
                         background: #333;
                         transition: transform 0.3s ease-out;
                       }
                       
                       
                       .navlinks-container a:hover::after {
                         transform: scaleX(1)
                       }
                       
                       .nav-authentication {
                         margin-left: auto;
                       }
                       
                      
                       .sign-btns button {
                         font-family: Roboto Flex, sans-serif;
                         font-size: 16px;
                         min-width: 90px;
                         padding: 10px 5px;
                         color: #fcfbfb;
                         background: #4D300A;
                         margin: 0 5px;
                         border-radius: 5px;
                         cursor: pointer;
                         border: none; 
                       }
                       
                       .sign-btns button:nth-child(2) {
                         border: none;
                         background: #4D300A;
                       }
                       .sign-user {
                         display: none;
                       }
                       
                       @media (max-width: 900px) {
                         nav {
                           padding: 15px 20px;
                           position: relative;
                         }
                       
                         .nav-icon {
                           
                           margin: 0 auto;
                         }
                       
                         .nav-icon span {
                           font-size: 22px;
                         }
                       
                         .main-navlinks {
                           order: 1;
                         }
                         
                       
                         .navlinks-container {
                           display: none;
                           flex-direction: column;
                           align-items: flex-start;
                           position: absolute;
                           background: #CFAE81;
                           top: 100%;
                           left: 0;
                           height: 100vh;
                           padding: 15px 50px 15px 20px;
                           border-right: 1px solid #c5c5c6;
                           transform: translate(-100%);
                         }
                         .open {
                           transform: translate(0%);
                         }
                         .navlinks-container a {
                           font-size: 18px;
                           margin: 10px 0
                         }
                       
                         .nav-authentication {
                           order: 3;
                           margin-left: 0;
                         }
                         .sign-btns {
                           display: none;
                         }
                         .sign-user {
                           display: block;
                           cursor: pointer;
                           border: none;
                         }
                         .sign-user img {
                           width: 20px;
                         }
                       
                       }
                       
                       @media (max-width: 500px) {
                        .nav {
                          margin: 0;
                        }
                        .navlinks-container {
                           display: none;
                           flex-direction: row;
                           align-items: flex-start;
                           position: absolute;
                          }
                          .a.nav-icon {
                            border: none;
                          }
                         .nav-icon img {
                           width: 40px;
                          
                           
                         }
                         .nav-icon span {
                           font-size: 14px;
                         }
                       }
 
 
                       /*  search bar   */
 
 .iconsearch {
   position: relative;
   top: 7px;
   left: 5px;
   height: 30px;
   width: 30px;
 }
 .searchcontainer {
   position: relative;
   border: solid 2px #fcfbfb;
   border-radius: 20px;
   background-color: #fffdfb;
   width: 500px;
   height: 50px;
   bottom: 3px;
   left: 180px;
   padding: 0%;
 }
 
 .searchcontainer input {
   position: absolute;
   display: block;
   padding: 7px;
   top: 7px;
   left: 50px;
   background-color: transparent;
   width: 350px;
   height: 30px;
   border-radius: 30px;
   border: transparent;
   border-bottom: 2px solid #50964E;
 }
 .searchcontainer button {
   position: absolute;
   top: 8px;
   right: 10px;
   height: 30px;
   width: 70px;
   background-color: transparent;
   border-radius: 20px;
   border-color: #ccc;
   cursor: pointer;
 }
 
 .searchcontainer select {
   
       border: none;
       left: 52%;
       padding: 0%;
       background: transparent;
       border-bottom: 2px solid #973e3e;
 }

 @media (max-width: 500px) {
.searchcontainer {
      left: 5px;
       width: 250px;
       background: transparent;
       margin: 15px;
     }
     .iconsearch {
      left: 150px;
       width: 15px;
     }
     .searchcontainer input {
      left: 5px;
   width: 170px;
   
   
   
 }
 .searchcontainer button {
  
   width: 50px;
  
   cursor: pointer;
 }
 
 .searchcontainer select {
   
       width: 50px;
 }
                       }
 </style>