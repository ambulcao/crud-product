<script setup>
import "../../style.css";

import { useAuthStore } from "../../stores/auth.tsx";
import { storeToRefs } from "pinia";
import { reactive } from 'vue';

const { errors } = storeToRefs(useAuthStore());
const { authenticate } = useAuthStore();

const formLogin = reactive({
  email: "",
  password: "",
});

function clearError(fieldName) {
  setTimeout(() => {
    if (errors[fieldName]) {
      errors[fieldName] = [];
    }
  }, 10);
}

const login = async () => {
  console.log('Enviando dados para login:', formLogin.email, formLogin.password); 

  await authenticate('login', formLogin);

  if (errors.email || errors.password || errors.general) {
    console.error('Erros de autenticação:', errors);
  }
};
</script>

<template>
  <main>
    <h1 class="title">Login</h1>

    <div class="container">
      <div class="row justify-content-center">
        <form @submit.prevent="login" class="col-12 col-md-6">

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              class="form-control"
              id="email"
              placeholder="Email"
              v-model="formLogin.email"
              @input="clearError('email')"
            />
            <div v-if="errors.email && errors.email.length > 0" class="error"> {{ errors.email[0] }} </div>
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
              type="password"
              class="form-control"
              id="password"
              placeholder="Password"
              v-model="formLogin.password"
              @input="clearError('password')"
            />
            <div v-if="errors.password && errors.password.length > 0" class="error"> {{ errors.password[0] }} </div>
          </div>

          <div class="col-12">
            <button type="submit" class="btn btn-primary w-100">
              Login
            </button>
          </div>

          <p class="mt-3">
            Ainda não tem uma conta? <router-link to="/register">Registre-se aqui</router-link>
          </p>

        </form>
      </div>
    </div>
  </main>
</template>