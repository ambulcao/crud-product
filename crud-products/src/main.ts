import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router/index.tsx' // Importe o roteador

createApp(App)
  .use(router) // Use o roteador na aplicação
  .mount('#app')