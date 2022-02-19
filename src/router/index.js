import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import isAuth from '../middleware/isAuth'
import isNotAuth from '../middleware/isNotAuth'
import checkGuid from '../middleware/checkGuid'
import newMessage from '../middleware/newMessage'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {
      middleware: [checkGuid, newMessage],
    },
  },
  {
    path: '/home',
    name: 'Home',
    component: () => import('../views/Home.vue'),
    meta: {
      middleware: [checkGuid, newMessage],
    },
  },
  {
    path: '/service/:id',
    name: 'Service',
    component: () => import('../views/Service.vue'),
    meta: {
      middleware: [ checkGuid, isNotAuth],
    },
  },
  {
    path: '/chat/:chatService?',
    name: 'Chat',
    component: () => import('../views/Chat.vue'),
    meta: {
      middleware: [ checkGuid, isNotAuth],
    },
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
    path: '/rechercher/:type?',
    name: 'Research',
    component: () => import('../views/Research'),
    meta:{
      middleware: [checkGuid]
    }
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
    path: '/profile/update',
    name: 'ProfileUpdate',
    component: () => import('../views/ProfileUpdate.vue'),
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
