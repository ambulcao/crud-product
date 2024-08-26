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

    <Modal v-if="showModal" :product="selectedProduct" @close="closeModal" :show-modal="showModal" />    
  </div>
</template>

<script setup>
import { onMounted, ref, nextTick } from 'vue';
import axios from 'axios';
import $ from 'jquery';
import 'datatables.net';
import Modal from './mod/ShowModal.vue'; // Certifique-se de importar o componente Modal corretamente

const products = ref([]);
const showModal = ref(false);
const selectedProduct = ref(null);

function closeModal() {
  showModal.value = false;
}

onMounted(async () => {
  try {
    const response = await axios.get('/api/produto'); 
    products.value = response.data;

    nextTick(() => { 
      const table = $('#productsTable').DataTable({
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
              const imagePath = `../../../public/image/${data}`; 
              return `<img src="${imagePath}" alt="Imagem do Produto" width="50">`; 
            }
          },
          { data: 'categoria_id' }, 
          {
            data: null, 
            render: function (data, type, row) {
              return `
                <button class="btn btn-primary btn-sm me-2" @click="showModal = true; selectedProduct = row;">Mostrar</button>
                <button class="btn btn-success btn-sm me-2">Edit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
              `;
            }
          }
        ]
      });

      // Use event delegation to handle button clicks
      $('#productsTable tbody').on('click', '.btn-primary', function () {
        const data = table.row($(this).parents('tr')).data();
        showModal.value = true;
        selectedProduct.value = data; 
        console.log('Botão Mostrar clicado. Dados do produto:', selectedProduct.value); // Adicione este log para depuração
      });
    });
  } catch (error) {
    console.error('Erro ao buscar produtos:', error);
  }
});
</script>