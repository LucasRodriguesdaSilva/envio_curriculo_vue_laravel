<template>
    <label :for="id" class="form-label fw-bold">{{ titulo }} {{ obrigatorio ? '*' : '' }}</label>
    <input type="file" @change="handleFile" class="form-control campo-arq" :id="id" :required="obrigatorio">
    <div v-if="error.exibir"  class="form-text text-danger mt-1 mb-0"> {{  error.msg }} </div>
    <div class="form-text">Formatos Suportados: {{ string_extensoes }} <br> Tam. máximo: {{ tamMax }}MB</div>
</template>

<script setup>
    import { ref } from 'vue';
    const props = defineProps({
        id: {type: String, required: true},
        titulo: {type: String, required: true},
        obrigatorio: { type: Boolean, default: false},
        extensoes: {type: Array, default: ()=>{return ['.pdf']}},
        tamMax: {type: Number, default: 1}
    })


    const string_extensoes = props.extensoes.join(', ');
    const TAMANHO_MAXIMO = props.tamMax * (1024 * 1024);
    const error = ref({
        msg: '',
        exibir: false
    });

    const mimeTypes = [
                        'application/pdf',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/msword',
                    ];


    const emit = defineEmits(['update:anexo']);

    const exibirMsgErro = (exibir=false, msg='') => {
        error.value.exibir = exibir;
        error.value.msg = msg;
    }

    const validarAnexo = (arquivo) => {

        if (arquivo === null || arquivo === undefined) {
            exibirMsgErro(true, 'Por favor, adicione um anexo!');
            return false;
        }

        if(!mimeTypes.includes(arquivo.type)) {
            exibirMsgErro(true, 'Arquivo não suportado!');
            return false;
        }

        if(arquivo.size > TAMANHO_MAXIMO) {
            exibirMsgErro(true, 'O tamanho máximo é de ' + props.tamMax + 'MB');
            return false;
        }

        return true;
    }

    const getElementById = (id) => {
        return document.getElementById(id);
    }

    const handleFile = (event) => {
        exibirMsgErro();
        const input = getElementById(props.id);
        const anexo = event.target.files[0];

        
        if(!validarAnexo(anexo)) {
            input.value = '';
            return;
        }
        
        emit('update:anexo', anexo);
    };


</script>

<style scoped>
    .campo-arq {
        background-color: #f8f6f6;
        border-radius: 0 20px 20px 0;
        border: 1px solid #b3b1b1;
    }
</style>