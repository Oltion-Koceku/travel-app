import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/views/Home.vue'
import Error404 from '@/views/Error404.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },

    {
      path: '/:pathMatch(.*)*',
      name: 'error404',
      component: Error404
    },
   
  ]
})

export default router
