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

    <Modal v-if="showModal" :categoria="selectedCategoria" @close="closeModal" :show-modal="showModal" />

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
import Modal from './mod/ShowModal.vue';

const categorias = ref([]);
const showModal = ref(false);
const selectedCategoria = ref(null);

function closeModal() {
  showModal.value = false;
}

onMounted(async () => {
  try {
    const response = await axios.get('/api/categoria');
    categorias.value = response.data;

    nextTick(() => {
      const table = $('#categoriesTable').DataTable({
        data: categorias.value,
        columns: [
          { data: 'id' },
          { data: 'nome' },
          {
            data: null,
            render: function (data, type, row) {
              return `
                <button class="btn btn-primary btn-sm me-2" @click="showModal = true; selectedCategoria = row;">Mostrar</button>
                <button class="btn btn-success btn-sm me-2">Edit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
              `;
            }
          }
        ]
      });

      $('#categoriesTable tbody').on('click', '.btn-primary', function () {
        const data = table.row($(this).parents('tr')).data();
        showModal.value = true;
        selectedCategoria.value = data;
        console.log('Botão Mostrar clicado. Dados da categoria:', selectedCategoria.value);
      });
    });
  } catch (error) {
    console.error('Erro ao buscar categorias:', error);
  }
});
</script>