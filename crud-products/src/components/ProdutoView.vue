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
            <tbody></tbody>
        </table>

        <Modal
            v-if="showModal"
            :product="selectedProduct"
            @close="closeModal"
            :show-modal="showModal"
        />

        <div v-if="showInsertModal" class="modal-overlay">
      <div class="modal-container">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Inserir Novo Produto</h5>
            <button type="button" class="btn-close" @click="closeInsertModal"></button>
          </div>
          <div class="modal-body">
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" @click="closeInsertModal">Fechar</button>
            <button type="button" class="btn btn-primary" @click="insertProduct">Salvar</button>
          </div>
        </div>
      </div>
    </div>

        <div class="d-flex justify-content-end">
            <router-link
                :to="{ name: 'categoria' }"
                class="btn btn-primary mt-3"
            >
                Gerenciar Categorias
            </router-link>
        </div>
    </div>
</template>


<script setup>
import { onMounted, ref, nextTick } from "vue";
import axios from "axios";
import $ from "jquery";
import "datatables.net";
import Modal from "./mod/ShowModal.vue";
const products = ref([]);
const showModal = ref(false);
const selectedProduct = ref(null);
const showInsertModal = ref(false); 

function closeModal() {
    showModal.value = false;
}

onMounted(async () => {
    try {
        const response = await axios.get("/api/produto");
        products.value = response.data;

        nextTick(() => {
            const table = $("#productsTable").DataTable({
                data: products.value,
                columns: [
                    { data: "id" },
                    { data: "nome" },
                    { data: "descricao" },
                    { data: "preco" },
                    { data: "data_de_validade" },
                    {
                        data: "imagem",
                        render: function (data, type, row) {
                            const imagePath = `../../../public/image/${data}`;
                            return `<img src="${imagePath}" alt="Imagem do Produto" width="50">`;
                        },
                    },
                    { data: "categoria_id" },
                    {
                        data: null,
                        render: function (data, type, row) {
                            return `
                <button class="btn btn-success btn-sm me-2" @click="openInsertModal">Inserir</button> 
                <button class="btn btn-primary btn-sm me-2" @click="showModal = true; selectedProduct = row;">Mostrar</button>
                <button class="btn btn-primary btn-sm me-2">Edit</button>
                <button class="btn btn-danger btn-sm">Delete</button>
              `;
                        },
                    },
                ],
            });

            $("#productsTable tbody").on("click", ".btn-primary", function () {
                const data = table.row($(this).parents("tr")).data();
                showModal.value = true;
                selectedProduct.value = data;
                console.log(
                    "Botão Mostrar clicado. Dados do produto:",
                    selectedProduct.value
                ); 
            });

        $('#productsTable tbody').on('click', '.btn-success', () => { 
            openInsertModal(); 
        }); 
            
        });
    } catch (error) {
        console.error("Erro ao buscar produtos:", error);
    }
});


</script>
