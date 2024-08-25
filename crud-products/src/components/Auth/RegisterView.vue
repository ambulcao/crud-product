<script setup>
import "../../style.css";

import { useAuthStore } from "../../store/auth.tsx";
import { reactive } from 'vue';

const authStore = useAuthStore()

const formRegister = reactive({
  nome: "",
  email: "",
  password: "",
  confirmarPassword: "",
})

</script>
<template>
    <main>
        <h1 class="title">Novo Registro {{ authStore.user }}</h1>

        <div class="container">
            <div class="row justify-content-center">
                <form @submit.prevent="console.log(formRegister)" class="col-12 col-md-6">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input
                            type="text"
                            class="form-control"
                            id="nome"
                            placeholder="Nome"
                            v-model="formRegister.nome"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            placeholder="Email"
                            v-model="formRegister.email"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            id="password"
                            placeholder="Password"
                            v-model="formRegister.password"
                        />
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
