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
          <label for="nome">Nome do Produto</label>
          <input type="text" id="nome" v-model="model.produto.nome" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="descricao">Descrição</label>
          <input type="text" id="descricao" v-model="model.produto.descricao" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="preco">Preço</label>
          <input type="text" id="preco" v-model="model.produto.preco" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="imagem">Imagem</label>
          <input type="file" id="imagem" @change="onImageChange" accept="image/jpeg, image/png" class="form-control" />
          <img v-if="model.produto.imagem_preview" :src="model.produto.imagem_preview" alt="Image Preview" class="mt-2" style="max-width: 200px;">
        </div>
        <div class="mb-3">
          <label for="data_de_validade">Data de Validade</label>
          <input type="date" id="data_de_validade" v-model="model.produto.data_de_validade" class="form-control" />
        </div>
        <div class="mb-3">
          <label for="categoria_id">Categoria ID</label>
          <input type="text" id="categoria_id" v-model="model.produto.categoria_id" class="form-control" />
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
  data() {
    return {
      errorList: '',
      model: {
        produto: {
          nome: '',
          descricao: '',
          preco: '',
          data_de_validade: '',
          imagem: null, 
          imagem_preview: null, 
          categoria_id: ''
        }
      }
    }
  },
  methods: {
    onImageChange(event) {
      const file = event.target.files[0];
      this.model.produto.imagem = file;

      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          this.model.produto.imagem_preview = e.target.result;
        };
        reader.readAsDataURL(file);
      } else {
        this.model.produto.imagem_preview = null;
      }
    },

    saveProduto() {
      var mythis = this;
      let formData = new FormData();

      for (const key in this.model.produto) {
        if (key !== 'imagem_preview') { 
          formData.append(key, this.model.produto[key]);
        }
      }

      if (this.model.produto.imagem) {
        formData.append('imagem', this.model.produto.imagem);
      }

      axios.post('http://127.0.0.1:8000/api/produto/', formData, {
        headers: {
          'Content-Type': 'multipart/form-data'
        }
      })
      .then(res => {
        console.log(res.data);
        alert(res.data.message);
        this.model.produto = {
          nome: '',
          descricao: '',
          preco: '',
          data_de_validade: '',
          imagem: null,
          imagem_preview: null,
          categoria_id: ''
        };
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