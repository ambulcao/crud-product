<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router' 
</script>

<template>
  <header>
    <nav>
      <RouterLink :to="{ name: 'home' }" class="nav-link">Home</RouterLink>

      <div>
        <RouterLink :to="{ name: 'login' }" class="nav-link">Login</RouterLink>
      </div>

      <div>
        <RouterLink :to="{ name: 'register' }" class="nav-link">Registrar</RouterLink>
      </div>
    </nav>
  </header>

  <main>
    <RouterView /> 
  </main>
</template>