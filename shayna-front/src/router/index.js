import Vue from 'vue'
import VueRouter from 'vue-router'
import HomeView from '../views/HomeView.vue'
import productView from '../views/productView.vue'
import cartView from '../views/cartView.vue'
import successView from '../views/successView.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/product/:id',
    props: true,
    name: 'product',
    component: productView
  },
  {
    path: '/cart',
    name: 'cart',
    component: cartView
  },
  {
    path: '/success',
    name: 'success',
    component: successView
  }
]

const router = new VueRouter({
  routes
})

export default router
