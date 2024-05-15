<template>
    <div :class="'border ' + css_bg + ' ' + ' ' + css_text">
        <p class="p-2 m-0 text-center"> {{ msg }}</p>
    </div>
</template>

<script setup>
    defineProps({
        msg: {type: String, default: ''},
        css_text: {type: String, default: 'text-white'},
        css_bg: {type: String, default: 'bg-danger'}
    })
</script>