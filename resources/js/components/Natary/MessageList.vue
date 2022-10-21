<script setup>
    defineProps({
        message: {type: Object, required: true}
    })
</script>
<template>
    <div class="border-b border-gray-400 mb-1.5">
        <p class="flex items-center mb-1.5">
            <span class="text-gray-700">Ф.И.О:</span>
            <span v-text="message.last_name" class="mx-2 text-indigo-700"></span>
            <span v-text="message.name" class="text-indigo-700"></span>
        </p>

        <p class="flex items-center mb-1.5">
            <span class="text-gray-700">Email:</span>
            <span v-text="message.email" class="mx-2 text-indigo-700"></span>
        </p>

        <p class="flex items-center mb-1.5">
            <span class="text-gray-700">Дата приема:</span>
            <span v-text="message.receipt_date" class="mx-2 text-indigo-700"></span>
        </p>

        <p class="flex items-center mb-1.5">
            <span class="text-gray-700">Вид документа:</span>
            <span v-text="message.record_type" class="mx-2 text-indigo-700"></span>
        </p>
    </div>
</template>
