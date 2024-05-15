<script setup>
import FormComponente from './components/forms/FormCurriculo.vue';
</script>

<template>
  <div class="d-flex justify-content-center align-items-center mt-sm-5 mb-sm-5" >
    <div class="col col-12 col-sm-6 cor-fundo-form">
      <div class="p-4">
        <h2>Se interessou pela vaga?</h2>
        <h4>Candidate-se agora</h4>
        <p> Preencha suas informações abaixo para submeter seu currículo e boa sorte!</p>
        <FormComponente />
      </div>
    </div>
  </div>
  
</template>

<style scoped>
  .cor-fundo-form {
        background-color: #fff;
    }
</style>
