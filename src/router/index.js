import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import isAuth from '../middleware/isAuth'
import isNotAuth from '../middleware/isNotAuth'
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
  },
  {
    path: '/rechercher',
    name: 'Research',
    component: () => import('../views/Research'),
  },
  {
    path: '/profile',
    name: 'Profile',
    component: () => import('../views/Profile.vue'),
    meta: {
      middleware: [isNotAuth, checkGuid],
    },
  },
  {
    path: '/ajouter-service',
    name: 'AddService',
    component: () => import('../views/AddService.vue'),
    meta: {
      middleware: [isNotAuth, checkGuid],
    },
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
