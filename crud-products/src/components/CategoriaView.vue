<template>
  <div class="container mt-5">
    <h1 class="title">Categorias</h1>

    <table id="categoriesTable" class="table table-striped table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <div class="d-flex justify-content-around">
      <div class="d-flex justify-content-start">
        <router-link :to="{ name: 'categoriaCreate' }" class="btn btn-primary mt-3">
          Add Categoria
        </router-link>
      </div>

      <div class="d-flex justify-content-end">
        <router-link :to="{ name: 'produto' }" class="btn btn-primary mt-3">
          Gerenciar Produto
        </router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref, nextTick } from 'vue';
import axios from 'axios';
import $ from 'jquery';
import 'datatables.net';

const categorias = ref([]);

async function deleteCategoria(categoryId) {
  if (confirm('Tem certeza que deseja excluir esta categoria?')) {
    try {
      await axios.delete(`/api/categoria/${categoryId}`);
      await fetchCategorias(); // Atualizar a tabela após a exclusão
    } catch (error) {
      console.error('Erro ao excluir categoria:', error);
      alert('Ocorreu um erro ao excluir a categoria. Por favor, tente novamente.'); 
    }
  }
}

async function fetchCategorias() {
  try {
    const response = await axios.get('/api/categoria');
    categorias.value = response.data;

    nextTick(() => {
      // Verificar se a tabela já foi inicializada
      if ($.fn.DataTable.isDataTable('#categoriesTable')) {
        // Se já foi inicializada, apenas atualizar os dados
        const table = $('#categoriesTable').DataTable();
        table.clear().rows.add(categorias.value).draw();
      } else {
        // Se não foi inicializada, criar a instância do DataTables
        const table = $('#categoriesTable').DataTable({
          data: categorias.value,
          columns: [
            { data: 'id' },
            { data: 'nome' },
            {
              data: null,
              render: function (data, type, row) {
                return `
                  <button class="btn btn-success btn-sm me-2">Edit</button>
                  <button class="btn btn-danger btn-sm" @click="deleteCategoria(${row.id})">Delete</button>
                `;
              }
            }
          ]
        });

        // Use event delegation to handle clicks on dynamically added "Delete" buttons
        $('#categoriesTable tbody').on('click', '.btn-danger', function () {
          const data = table.row($(this).parents('tr')).data();
          deleteCategoria(data.id);
        });
      }
    });
  } catch (error) {
    console.error('Erro ao buscar categorias:', error);
  }
}

onMounted(fetchCategorias); // Chamar fetchCategorias quando o componente for montado
</script>