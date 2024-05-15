<script setup>

  import { ref } from 'vue';
  import FormComponente from './components/forms/FormCurriculo.vue';

  const base = ref('http://127.0.0.1:8000/api/');
  const endpoint = ref('curriculo/cadastrar');
</script>

<template>
  <div class="d-flex justify-content-center align-items-center mt-sm-5 mb-sm-5" >
    <div class="col col-12 col-sm-6 cor-fundo-form">
      <div class="p-4">
        <FormComponente :endpoint="base + endpoint" />
      </div>
    </div>
  </div>
  
</template>

<style scoped>
  .cor-fundo-form {
        background-color: #fff;
    }
</style>
