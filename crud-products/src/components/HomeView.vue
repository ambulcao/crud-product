<template>
  <div class="container">
    <div class="class">
      <div class="d-grid card-header">
        <div  class="d-flex justify-content-center mt-3">
          <h4> Produtos </h4>
        </div>
        <dir class="d-flex justify-content-end flex-grow-0 flex-shrink-1">
          <RouterLink to="/home" class="btn btn-primary"> Add Produto </RouterLink>
        </dir>
      </div>

      <div class="card-body">

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Descrição</th>
              <th>Preço</th>
              <th>Data de Validade</th>
              <th>Imagem</th>
              <th>Categoria ID</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody v-if="this.produto.length > 0">
            <tr v-for="(produto, index) in this.produto" :key="index">
              <td>{{ produto.id }}</td>
              <td>{{ produto.nome }}</td>
              <td>{{ produto.descricao }}</td>
              <td>{{ produto.preco }}</td>
              <td>{{ produto.imagem }}</td>
              <td>{{ produto.data_de_validade }}</td>
              <td>{{ produto.categoria_id }}</td>
              <td>
                <RouterLink to="/home" class="btn btn-success">
                  Edit
                </RouterLink>
                <button type="button" class="btn btn-danger">Delete</button>
              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <tr>
              <td colspan="8">Carregando...</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  name: 'home',
  data(){
    return {
      produto: []
    }
  },
  mounted(){
  
    this.getProduto();
    //console.log('Estou aqui')
  
  },
  methods: {
    getProduto(){
      axios.get('http://127.0.0.1:8000/api/produto/').then(res => {
        this.produto = res.data
        console.log(this.produto)
      });
    }
  }
}
</script>