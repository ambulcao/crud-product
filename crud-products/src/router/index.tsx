import { createRouter, createWebHistory } from 'vue-router';
import LoginView from '../components/Auth/LoginView.vue';
import RegisterView from '../components/Auth/RegisterView.vue';
import ProdutoView from '../components/ProdutoView.vue'; 
import CategoriaView from '../components/CategoriaView.vue';
import produtoCreateView from '../components/produtoCreateView.vue';
import HomeView from '../components/HomeView.vue';
import categoriaCreateView from '../components/categoriaCreateView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/', 
      name: 'login', 
      component: LoginView
    },
    {
      path: '/register',
      name: 'register',
      component: RegisterView
    },
    {
      path: '/produto',
      name: 'produto',
      component: ProdutoView,
      meta: { requiresAuth: true } 
    },
    {
      path: '/categoria',
      name: 'categoria',
      component: CategoriaView, 
    },
    {
      path: '/home',
      name: 'home',
      component: HomeView, 
    },
    {
      path: '/produto/create',
      name: 'produtoCreate',
      component: produtoCreateView, 
    },
    {
      path: '/categoria/create',
      name: 'categoriaCreate',
      component: categoriaCreateView, 
    }
  ]
});


export default router;