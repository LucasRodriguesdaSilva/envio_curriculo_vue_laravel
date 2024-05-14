<template>
    <div v-if="error.exibir" class="border bg-danger text-white">
        <p class="p-2 m-0 text-center"> {{ error.msg }}</p>
    </div>
    <div class="container-fluid cor-fundo-form">
        <div class="mt-4">
            <form @submit.prevent="submitForm">
                <div class="row">
                    <div class="mb-3 col col-12 col-sm-6 ">
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
                            placeholder="(XX) XXXXX-XXXX"
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
                        <InputSelectBase :opcoes="opcoesEscolaridade" titulo="Escolaridade" v-model:selecionado="formData.escolaridade" :obrigatorio="true" />                        
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
                <button type="submit" class="btn btn-primary col col-12 col-sm-12 rounded-pill">Enviar Currículo</button>
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
const error = ref({
    msg: '',
    exibir: false
})

const formData = ref({
    nome: '',
    email: '',
    telefone: '',
    cargo: '',
    escolaridade: undefined,
    obs: '',
    curriculo: []
});


const setFile = (newFile) => {
    formData.value.curriculo = newFile;    
}

const validadores = {
    tel: (numTelefone) => {
        const phoneRegex = /^(?:\(?([1-9][0-9])\)?[\s-]?)?(?:(?:9\d{4}|[2-9]\d{3})[\s-](\d{4}))$/;
        return phoneRegex.test(numTelefone);
    },
    cel: (numCelular) => {
        const phoneRegex = /^\(?[0-9]{2}\)?[\s-]?[0-9]{4,5}[\s-]?[0-9]{4}$/;
        return phoneRegex.test(numCelular);
    }
}

const exibirMsgErro = (exibir=false, msg='') => {
    error.value.exibir = exibir;
    error.value.msg = msg;
}

const submitForm = () => {
    exibirMsgErro();
    const {telefone} = formData.value;
    if (!validadores.tel(telefone) || !validadores.cel(telefone)) 
        return exibirMsgErro(true, 'O Telefone não é válido');

    console.log(formData.value)
}
</script>

<style scoped>
</style>