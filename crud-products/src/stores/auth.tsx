import { defineStore } from 'pinia';
import { useRouter } from 'vue-router';

export const useAuthStore = defineStore("authStore", {
  state: () => {
    return {
      user: null,
      errors: {},
    };
  },
  getters: {},
  actions: {
    async authenticate(apiRoute, formData) {
      const router = useRouter();

      try {
        const res = await fetch(`/api/${apiRoute}`, {
          method: 'post',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(formData),
        });

        if (!res.ok) {
          const errorData = await res.json();
          if (errorData.errors) {
            this.errors = errorData.errors;
          } else if (errorData.message) {
            this.errors = { email: [errorData.message], password: [errorData.message] }; 
          } else {
            this.errors = { general: ['Ocorreu um erro durante a autenticação.'] };
          }
          return; 
        }

        const data = await res.json();
        console.log('Resposta da API (sucesso):', data); 

        localStorage.setItem('token', data.token);
        this.user = data.user;

        if (apiRoute === 'login') {
          router.push('/produto'); 
        } 
      } catch (error) {
        console.error('Erro na autenticação:', error);
        this.errors = { general: ['Ocorreu um erro durante a autenticação.'] };
      }
    },
  },
});