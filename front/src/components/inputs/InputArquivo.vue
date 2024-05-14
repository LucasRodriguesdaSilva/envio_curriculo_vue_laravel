<template>
    <label :for="id" class="form-label">{{ titulo }}</label>
    <input type="file" @change="handleFile" class="form-control" :id="id" :required="obrigatorio">
    <div v-if="mostrarErro"  class="form-text text-danger mt-1 mb-0"> {{  msg_erro }} </div>
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
    const msg_erro = ref('');
    const mostrarErro = ref(''); 

    const mimeTypes = [
                        'application/pdf',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/msword',
                    ];


    const emit = defineEmits(['update:anexo']);

    const validarAnexo = (arquivo) => {

        if (arquivo === null || arquivo === undefined) {
            msg_erro.value = 'Por favor, adicione um anexo!';
            mostrarErro.value = true;
            return false;
        }

        if(!mimeTypes.includes(arquivo.type)) {
            msg_erro.value = 'Arquivo não suportado!';
            mostrarErro.value = true;
            return false;
        }

        if(arquivo.size > TAMANHO_MAXIMO) {
            msg_erro.value = 'O tamanho máximo é de ' + props.tamMax + 'MB';
            mostrarErro.value = true;
            return false;
        }

        return true;
    }

    const getElementById = (id) => {
        return document.getElementById(id);
    }

    const handleFile = (event) => {
        mostrarErro.value = false;
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
</style>