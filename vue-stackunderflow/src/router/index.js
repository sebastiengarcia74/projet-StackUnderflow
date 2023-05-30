import { createRouter, createWebHistory } from 'vue-router'
import Register from '../components/Register.vue'
import Login from '../components/Login.vue'
import Admin from '../views/Admin.vue'
import AdminUsers from '../components/AdminUsers.vue'
import AdminCategories from '../components/AdminCategories.vue'
import AdminUnderflow from '../components/AdminUnderflow.vue'
import AdminPost from '../components/AdminPost.vue'
import AdminComment from '../components/AdminComment.vue'
import TestPage from '../components/TestPage.vue'
import Home from '../views/Home.vue'
import Profilepage from '../views/Profilepage.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/register',
      name: 'register',
      component: Register
    },
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/admin',
      name: 'admi',
      component: Admin
    },
    {
      path: '/user',
      name: 'adminuser',
      component: AdminUsers
    },
    {
      path: '/categories',
      name: 'adminCategorie',
      component: AdminCategories
    },
    {
      path: '/underflows',
      name: 'adminUnderflow',
      component: AdminUnderflow
    },
    {
      path: '/posts',
      name: 'adminPost',
      component: AdminPost
    },
    {
      path: '/comments',
      name: 'adminComment',
      component: AdminComment
    },
    
    {
      path: '/test',
      name: 'testmodal',
      component: TestPage
    },
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/Profilepage',
      name: 'profilepage',
      component: Profilepage
    },

  ]
})

export default router

