<template>
  <div class="container mt-5">
    <h1 class="title">Produtos</h1>

    <table id="productsTable" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Descrição</th>
          <th>Preço</th>
          <th>Data de Validade</th>
          <th>Imagem</th>
          <th>Categoria</th>
          <th>Ações</th> 
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { onMounted, ref, nextTick } from 'vue';
import axios from 'axios';
import $ from 'jquery';
import 'datatables.net';

const products = ref([]);

onMounted(async () => {
  try {
    const response = await axios.get('/api/produto'); 
    products.value = response.data;

    nextTick(() => { 
      $('#productsTable').DataTable({
        data: products.value,
        columns: [
          { data: 'id' },
          { data: 'nome' },
          { data: 'descricao' },
          { data: 'preco' },
          { data: 'data_de_validade' },
          { 
            data: 'imagem',
            render: function (data, type, row) {
              // Construir o caminho completo da imagem
              const imagePath = `/src/assets/upload/${data}`; 
              return `<img src="${imagePath}" alt="Imagem do Produto" width="50">`; 
            }
          },
          { data: 'categoria_id' }, 
          {
            data: null, 
            render: function (data, type, row) {
              return `
                <button class="btn btn-primary btn-sm me-2">Show</button>
                <button class="btn btn-success btn-sm me-2">Edit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
              `;
            }
          }
        ]
      });
    });
  } catch (error) {
    console.error('Erro ao buscar produtos:', error);
  }
});
</script>