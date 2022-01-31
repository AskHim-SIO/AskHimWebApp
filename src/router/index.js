import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import isAuth from '../middleware/isAuth'
import checkGuid from '../middleware/checkGuid'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      middleware: [checkGuid],
    },
  },
  {
    path: '/about',
    name: 'About',
    component: () => import('../views/About.vue')
  },
  {
    path: '/se-connecter',
    name: 'Login',
    component: () => import('../views/Login.vue'),
    meta: {
      middleware: [isAuth],
    },
  },
  {
    path: '/rejoindre',
    name: 'Rejoindre',
    component: () => import('../views/Register.vue'),
    meta: {
      middleware: [isAuth],
    },
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
