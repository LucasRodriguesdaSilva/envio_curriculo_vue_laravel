<template>
    <div v-if="ocultarForms" class="container-fluid" >
        <p class="p-2 m-0 text-start cor-texto-padrao ">
            <strong>Parabéns! Seu currículo foi entregue com sucesso.</strong><br><br>
            Agradecemos pelo seu interesse na oportunidade e desejamos a você todo sucesso no processo seletivo. Que suas habilidades e experiências se destaquem, e que esta seja a primeira etapa rumo a uma jornada profissional gratificante.<br><br>
            Obrigado por escolher nossa empresa e boa sorte!
        </p>      
    </div>
    <div v-if="!ocultarForms">
        <div v-if="error.exibir">
            <MensagemComponente :msg="error.msg" :css_text="error.css_text" :css_bg="error.css_bg" />
        </div>
        <div class="container-fluid cor-fundo-form">
            <div class="p-2">
                <h2>Se interessou pela vaga?</h2>
                <h4>Candidate-se agora</h4>
                <p> Preencha suas informações abaixo para submeter seu currículo e boa sorte!</p>
                <form @submit.prevent="submitForm">
                    <div class="row">
                        <div class="mb-3 col col-12 col-sm-6 ">
                            <InputBase
                                v-model="formData.candidato"
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
                    <button type="submit" class="btn col col-12 col-sm-12 rounded-pill cor-botao-padrao cor-texto-padrao" >Enviar Currículo</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>

    import { ref } from 'vue';
    import axios from 'axios'; 

    import InputBase from '../inputs/InputBase.vue';
    import InputSelectBase from '../inputs/InputSelectBase.vue';
    import InputTextarea from '../inputs/InputTextarea.vue';
    import InputArquivo from '../inputs/InputArquivo.vue';
    import MensagemComponente from '../mensagens/MensagemComponente.vue';

    const props = defineProps({
        endpoint: {type: String, required: true}
    })



    const opcoesEscolaridade = ref([
        { id: 1, valor: 'Ensino Fundamental' },
        { id: 2, valor: 'Ensino Médio' },
        { id: 3, valor: 'Ensino Superior' }
    ]);

    const extensoesAceitas = ref(['.pdf','.doc','.docx']);
    const error = ref({
        msg: '',
        css_bg: '',
        css_text: '',
        exibir: false
    });

    const ocultarForms = ref();

    const formData = ref({
        candidato: '',
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

    const submitForm = () => {
        setDivMensagem({});
        const {telefone} = formData.value;
        if (!validadores.tel(telefone) || !validadores.cel(telefone)) 
            return setDivMensagem({
                exibir: true, 
                msg: 'Número de Telefone inválido!', 
                css_bg:'bg-danger', 
                css_text:'text-white'
            });

        const dados = criarFormData();

        axios.post(props.endpoint, dados, {
            headers: {'Content-Type': 'multipart/form-data'}
        })
        .then(res => {
            if (res.status == 200)
                ocultarForms.value = true;                
        })
        .catch(() => {
            setDivMensagem({
                exibir: true, 
                msg: 'Houve um erro ao Processar as informações', 
                css_bg:'bg-danger', 
                css_text:'text-white'
            });
        })
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

    const setDivMensagem = (dados) => {
        const {msg= '', css_bg= '', css_text='', exibir=false } = dados;

        error.value = {msg, css_bg, css_text, exibir};
    }

    const criarFormData = () => {
        const dadosForm = new FormData();
        Object.entries(formData.value).forEach(([key, value]) => {
            dadosForm.append(key, value);
        });
        // dadosForm.append('dadosForm', JSON.stringify(formData.value));
        dadosForm.append('nome_anexo', formData.value.curriculo.name);

        return dadosForm;
    }
    
</script>

<style scoped>
</style>