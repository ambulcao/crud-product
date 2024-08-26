<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router'
import { useAuthStore } from './stores/auth'

const authStore = useAuthStore();
</script>

<template>
  <header>
    <nav>
      

      <p v-if="authStore.user">{{ authStore.user.name }}</p>

      <div>
        <RouterLink :to="{ name: 'login' }" class="nav-link">Login</RouterLink>
      </div>

      <div>
        <RouterLink :to="{ name: 'register' }" class="nav-link">Registrar</RouterLink>
      </div>

      <div>
        <RouterLink :to="{ name: 'home' }" class="nav-link">Produto</RouterLink>
      </div>

    </nav>
  </header>

  <main>
    <RouterView /> 
  </main>
</template>