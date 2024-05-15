<template>
    <label :for="id"  class="form-label fw-bold cor-texto-padrao">{{titulo}} {{ obrigatorio ? '*' : '' }} </label>
    <input 
        class="form-control campo-input input-default " 
        :type="tipo" 
        :required="obrigatorio" 
        :id="id" 
        :placeholder="placeholder" 
        :value="modelValue" 
        @input="$emit('update:modelValue', $event.target.value)"
        v-bind="$attrs">
    <div v-if="obs" class="form-text cor-texto-padrao">{{obs}}</div>
</template>

<script setup>
    defineProps({
        id: String,
        titulo: String,
        modelValue: { type: String, default: ''},
        tipo: { type: String, default: 'text' },
        obrigatorio: { type: Boolean, default: false},
        placeholder: { type: String, default: ''},
        obs: { type: [String, Boolean], default: false}
    })
</script>

<style scoped>
    .campo-input {
        background-color: #f8f6f6;
        border-radius: 20px;
        border: 1px solid #b3b1b1;
    }
</style>