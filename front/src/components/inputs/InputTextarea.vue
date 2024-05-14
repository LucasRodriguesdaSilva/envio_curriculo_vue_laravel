<template>
    <label :for="id" class="form-label">{{ titulo }}</label>
    <textarea class="form-control" :id="id" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)"></textarea>
</template>

<script setup>
    defineProps({
        id: String,
        titulo: String,
        modelValue: { type: String, default: ''},
    })



</script>

<style scoped>
</style>