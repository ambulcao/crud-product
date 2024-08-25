<script setup lang="ts">
import { RouterLink, RouterView } from 'vue-router' 
</script>

<template>
  <header>
    <nav>
      <RouterLink to="/" class="nav-link">Home</RouterLink>

      <div>
        <RouterLink to="/login" class="nav-link">Login</RouterLink>
      </div>

      <div>
        <RouterLink to="/register" class="nav-link">Registrar</RouterLink>
      </div>
    </nav>
  </header>

  <main>
    <RouterView /> 
  </main>
</template>