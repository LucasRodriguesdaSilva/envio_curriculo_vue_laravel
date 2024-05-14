<template>
    <label for="id" class="form-label fw-bold">Escolariadade</label>
    <select id="id" @change="atualizarSelecionado" :required="obrigatorio" class="form-control campo-select">
        <option value="" selected disabled>Selecione uma Opção</option>
        <option v-for="opcao in opcoes" :key="opcao.id" :value="opcao.id" v-bind="$attrs">
            {{ opcao.valor }}
        </option>
    </select>
</template>

<script setup>
    import { ref } from 'vue';
    const selecionado = ref('');
    defineProps({
        opcoes: Array,
        obrigatorio: { type: Boolean, default: false},

    })
    
    const emit = defineEmits(['update:selecionado']);

    const atualizarSelecionado = (event) => {
        selecionado.value = event.target.value;
        emit('update:selecionado', selecionado.value);
    };

</script>

<style scoped>
    .campo-select {
        background-color: #f8f6f6;
        border-radius: 20px;
        border: 1px solid #b3b1b1;
    }
</style>