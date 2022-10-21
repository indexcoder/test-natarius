<script setup>
    defineProps({
        id: String,
        labelText: String,
        modelValue: [Number, String],
        type: {
            type: String,
            default: 'text'
        },
        required: {
            type: Number,
            default: 0
        },
        errMessage: {
            type: String,
            default: ''
        }
    });
</script>
<template>
    <div class="mb-8 flex items-baseline">
        <label :for="id" v-text="labelText + ':'" class="sm:mr-2 text-gray-700 flex-shrink-0 mb-1 sm:mb-0 block"></label>
        <div class="w-full">
            <input :id="id"
                   :type="type"
                   :value="modelValue"
                   :required="required"
                   @change="$emit('update:modelValue', $event.target.value)"
                   :class="[errMessage.length > 0 ? 'border-red-400' : 'border-gray-400']"
                   class="w-full block px-2 py-1 font-normal text-gray-700 bg-white shadow-sm border-b rounded-sm focus:border-blue-600 focus:outline-none"
            />
            <p v-if="errMessage.length > 0" v-text="errMessage" class="text-xs text-red-500 mt-1.5 pl-1"></p>
        </div>
    </div>
</template>

