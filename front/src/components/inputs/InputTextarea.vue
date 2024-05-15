<template>
    <label :for="id" class="form-label fw-bold cor-texto-padrao">{{ titulo }}</label>
    <textarea class="form-control campo-text" :id="id" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)"></textarea>
</template>

<script setup>
    defineProps({
        id: String,
        titulo: String,
        modelValue: { type: String, default: ''},
    })



</script>

<style scoped>
    .campo-text {
        background-color: #f8f6f6;
        border-radius: 10px;
        border: 1px solid #b3b1b1;
    }
</style>