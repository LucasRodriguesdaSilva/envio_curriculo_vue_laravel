<template>
    <div class="border container-fluid cor-fundo-form">
        <div class="p-4">
            <form @submit.prevent="submitForm">
                <div class="row">
                    <div class="mb-3 col col-12 col-sm-6">
                        <InputBase
                            v-model="formData.nome" 
                            id="input_nome" 
                            titulo="Nome Completo" 
                            tipo="text" 
                            :obrigatorio="true"
                        />
                    </div>
                    <div class="mb-3 col col-12 col-sm-6">
                        <InputBase 
                            v-model="formData.email"
                            id="input_email" 
                            titulo="E-mail" 
                            type="email" 
                            :obrigatorio="true"
                            obs="Nunca compartilharemos o seu e-mail"
                        />
                    </div>
                    <div class="mb-3 col col-12 col-sm-6">
                        <InputBase 
                            v-model="formData.telefone"
                            id="input_cel" 
                            titulo="Telefone" 
                            type="text" 
                            :obrigatorio="true"
                            placeholder="( XX ) XXXXX-XXXX"
                        />
                    </div>
                    <div class="mb-3 col col-12 col-sm-6">
                        <InputBase 
                            v-model="formData.cargo"
                            id="input_cargo" 
                            titulo="Cargo Desejado" 
                            type="text" 
                            :obrigatorio="true"
                        />
                    </div>
                    <div class="mb-3 col col-12 col-sm-6">
                        <InputSelectBase :opcoes="opcoesEscolaridade" v-model:selecionado="formData.escolaridade" :obrigatorio="true" />                        
                    </div>
                    <div class="mb-3 col col-12 col-sm-6">
                        <InputTextarea id="input_obs" titulo="Observação" v-model="formData.obs"/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col col-12 col-sm-12">
                        <InputArquivo id="input_arq" titulo="Currículo" :extensoes="extensoesAceitas" :obrigatorio="true" @update:anexo="setFile" />
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>

<script setup>

import { ref } from 'vue';
import InputBase from '../inputs/InputBase.vue';
import InputSelectBase from '../inputs/InputSelectBase.vue';
import InputTextarea from '../inputs/InputTextarea.vue';
import InputArquivo from '../inputs/InputArquivo.vue';

const opcoesEscolaridade = ref([
    { id: 1, valor: 'Ensino Fundamental' },
    { id: 2, valor: 'Ensino Médio' },
    { id: 3, valor: 'Ensino Superior' }
]);

const extensoesAceitas = ref(['.pdf','.doc','.docx']);

const formData = ref({
    nome: '',
    email: '',
    telefone: '',
    cargo: '',
    escolaridade: undefined,
    obs: '',
    curriculo: []
});


const submitForm = () => {
    console.log(formData.value)
}

const setFile = (newFile) => {
    formData.value.curriculo = newFile;    
}

</script>

<style scoped>
    .cor-fundo-form {
        background-color: #ffffff;
    }
</style>