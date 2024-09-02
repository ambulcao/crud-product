<template>
    <div class="container mt-5">
      <div class="card">
        <div class="card-header">
          <h4>Add Categoria</h4>
        </div>
        <div class="card-body">
  
          <ul class="alert alert-warning" v-if="Object.keys(this.errorList).length > 0">
            <li class="mb-0 ms-3" v-for="(error, index) in this.errorList" :key="index">
              {{ error[0] }}
            </li>
          </ul>
  
          <div class="mb-3">
            <label for="nome">Nome da Categoria</label>
            <input type="text" id="nome" v-model="model.categoria.nome" class="form-control" />
          </div>
          <div v-if="successMessage" class="alert alert-success mt-3">
            {{ successMessage }}
          </div>
          <div class="mb-3">
            <button type="button" @click="saveCategoria" class="btn btn-primary">Salvar</button>
          </div>
          <div class="d-flex justify-content-end">
        <router-link :to="{ name: 'categoria' }" class="btn btn-primary mt-3">
          <= Voltar Categoria
        </router-link>
      </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import { useRouter } from 'vue-router';

  const router = useRouter();
  
  export default {
    name: 'categoriaCreate',
    data() {
      return {
        errorList: '',
        model: {
          categoria: {
            nome: '',
          }
        }
      }
    },
    methods: {
    
      saveCategoria() {
  var mythis = this;
  let formData = new FormData();

  // Append the 'nome' to the FormData
  formData.append('nome', this.model.categoria.nome); 

  axios.post('http://127.0.0.1:8000/api/categoria/', formData, {
    headers: {
      'Content-Type': 'multipart/form-data'
    }
  })
  .then(res => {
    console.log(res.data);
    // Definir a mensagem de sucesso
    this.successMessage = 'Categoria adicionada com sucesso!';

    this.model.categoria = {
      nome: ''
    };

    // Limpar a mensagem de sucesso após um tempo (opcional)
    setTimeout(() => {
      this.successMessage = '';
    }, 3000); // 3 segundos

    router.push({ name: 'categoria' }); 
  })
  .catch(function (error) {
    if (error.response) {
      if (error.response.status == 422) {
        mythis.errorList = error.response.data.errors;
      }
    } else if (error.request) {
      console.log(error.request);
    } else {
      console.log('Error', error.message);
    }
  });
}

}
  }
  </script>