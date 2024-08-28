import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/views/Home.vue'
import Addtrip from '@/views/Addtrip.vue'
import Error404 from '@/views/Error404.vue'
import TripDetail from '@/views/TripDetail.vue'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/addtrip',
      name: 'addtrip',
      component: Addtrip
    },

    {
      path: '/trip-detail/:slug',
      name: 'tripDetail',
      component: TripDetail
    },

    {
      path: '/:pathMatch(.*)*',
      name: 'error404',
      component: Error404
    },
   
  ]
})

export default router
