<script setup>
import "../../style.css";

import { useAuthStore } from "../../stores/auth.tsx";
import { storeToRefs } from "pinia";
import { reactive } from 'vue';

const { errors } = storeToRefs(useAuthStore());
const { authenticate } = useAuthStore();

const formRegister = reactive({
  nome: "",
  email: "",
  password: "",
  confirmarPassword: "",
})

function clearError(fieldName) {
  setTimeout(() => {
    if (errors[fieldName]) {
      errors[fieldName] = [];
    }
  }, 10);
}

</script>
<template>
    <main>
        <h1 class="title">Novo Registro</h1>

        <div class="container">
            <div class="row justify-content-center">
                <form @submit.prevent="authenticate('register', formRegister)" class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nome"
                            placeholder="Nome"
                            v-model="formRegister.nome"
                            @input="clearError('name')"
                        />
                        <div v-if="errors.name && errors.name.length > 0" class="error"> {{ errors.name[0] }} </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            placeholder="Email"
                            v-model="formRegister.email"
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
                            v-model="formRegister.password"
                            @input="clearError('password')"
                        />
                        <div v-if="errors.password && errors.password.length > 0" class="error"> {{ errors.password[0] }} </div>
                    </div>

                    <div class="mb-3">
                        <label for="confirmarPassword" class="form-label"
                            >Confirmar Password</label
                        >
                        <input
                            type="password"
                            class="form-control"
                            id="confirmarPassword"
                            placeholder="Confirmar Password"
                            v-model="formRegister.confirmarPassword"
                        />
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary w-100">
                            Registrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</template>
