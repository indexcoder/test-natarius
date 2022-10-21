<script setup>
    defineProps({
        labelText: String,
        modelValue: [Number, String],
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
    <div class="mb-8 sm:flex sm:items-center">
        <label for="dateInput" v-text="labelText + ':'" class="text-gray-700 dark:text-gray-300 flex-shrink-0 block"></label>
        <div class="w-full sm:mx-2">
            <input id="dateInput"
                   type="date"
                   :required="required"
                   :value="modelValue"
                   @change="$emit('update:modelValue', $event.target.value)"
                   :class="[errMessage.length > 0 ? 'border-red-400 dark:border-red-600' : 'border-gray-400 dark:border-gray-600']"
                   class="w-full my-1 sm:my-0 block px-2 py-1 font-normal text-gray-700 dark:text-gray-300 bg-white dark:bg-[#222222] shadow-sm border-b rounded-sm focus:border-blue-600 dark:focus:border-blue-200"
            />
            <p v-if="errMessage.length > 0" v-text="errMessage" class="text-xs text-red-500 mt-1.5 pl-1"></p>
        </div>
        <button type="button" onclick="dateInput.showPicker()" class="w-full md:w-auto flex-shrink-0 text-gray-700 hover:text-blue-700 border-b border-gray-400 py-1.5 px-3 rounded-sm bg-gray-50 hover:bg-gray-300">
            Выбрать
        </button>
    </div>
</template>

