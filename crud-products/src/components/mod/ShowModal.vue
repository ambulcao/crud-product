<template>
  <div v-if="showModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detalhes do Produto</h5>
          <button type="button" class="btn-close" @click="closeModal"></button>
        </div>
        <div class="modal-body">
          <div v-if="product"> 
            <p>ID: {{ product.id }}</p>
            <p>Nome: {{ product.nome }}</p>
            <p>Descrição: {{ product.descricao }}</p>
            <p>Preço: {{ product.preco }}</p>
            <p>Data de Validade: {{ product.data_de_validade }}</p>
            <img :src="`/public/image/${product.id}.jpg`" alt="Imagem do Produto" width="100"> 
            <p>Categoria: {{ product.categoria_id }}</p> 
          </div>
          <div v-else>
            <p>Carregando detalhes do produto...</p> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" @click="closeModal">Fechar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps, defineEmits, ref, watch } from 'vue';

const props = defineProps({
  showModal: {
    type: Boolean,
    required: true
  },
  product: {
    type: Object, 
    required: false 
  }
});

console.log('Dados do produto recebidos no modal:', props.product); // Adicione este log para depuração

const emit = defineEmits(['close']);

const selectedProduct = ref(props.product);

// Watch for changes in the 'product' prop and update 'selectedProduct' accordingly
watch(() => props.product, (newProduct) => {
  selectedProduct.value = newProduct;
});

function closeModal() {
  emit('close');
}
</script>