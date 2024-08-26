<template>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>Add Produtos</h4>
      </div>
      <div class="card-body">

        <ul class="alert alert-warning" v-if="Object.keys(this.errorList).length > 0">
          <li class="mb-0 ms-3" v-for="(error, index) in this.errorList" :key="index">
            {{ error[0] }}
          </li>
        </ul>

        <div class="mb-3">
          <label for="">Nome do Produto</label>
          <input type="text" v-model="model.produto.nome" class="form-control"/>
        </div>
        <div class="mb-3">
          <label for="">Descrição</label>
          <input type="text" v-model="model.produto.descricao" class="form-control"/>
        </div>
        <div class="mb-3">
          <label for="">Preço</label>
          <input type="text" v-model="model.produto.preco" class="form-control"/>
        </div>
        <div class="mb-3">
          <label for="">Data de Validade</label>
          <input type="text" v-model="model.produto.data_de_validade" class="form-control"/>
        </div>
        <div class="mb-3">
          <label for="">Categoria ID</label>
          <input type="text" v-model="model.produto.categoria_id" class="form-control"/>
        </div>
        <div class="mb-3">
          <button type="button" @click="saveProduto" class="btn btn-primary">Salvar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'produtoCreate',
  data(){
    return {
      errorList: '',
      model: {
        produto : {
          nome: '',
          descricao: '',
          preco: '',
          data_de_validade: '',
          imagem: '',
          categoria_id: ''
        }
      }
    }
  },
  methods: {

    
    saveProduto(){

      var mythis = this;
      
      axios.post('http://127.0.0.1:8000/api/produto/', this.model.produto)
      .then(res => {
        console.log(res.data);
        alert(res.data.message);
        this.model.produto = {
          nome: '',
          descricao: '',
          preco: '',
          data_de_validade: '',
          imagem: '',
          categoria_id: ''
        }
      })
      .catch(function (error) {
        if(error.response) {
          if(error.response.status == 422) {
            mythis.errorList = error.response.data.errors;
          }
          //console.log(error.response.data);
          //console.log(error.response.status);
          //console.log(error.response.headers);
        } else if (error.request) {
          console.log(error.request);
        } else {
          console.log('Error', error.message);
        }
      });
    }

  },
}

</script>