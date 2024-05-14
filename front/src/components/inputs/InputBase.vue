<template>
    <label :for="id"  class="form-label">{{titulo}}</label>
    <input 
        class="form-control" 
        :type="tipo" 
        :required="obrigatorio" 
        :id="id" 
        :placeholder="placeholder" 
        :value="modelValue" 
        @input="$emit('update:modelValue', $event.target.value)"
        v-bind="$attrs">
    <div v-if="obs" class="form-text">{{obs}}</div>
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
</style>