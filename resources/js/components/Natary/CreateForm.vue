<script setup>
    import {ref} from "vue";
    import notariesApi from '@/api/notaries';
    import vueInput from "@/components/form/VueInput.vue";
    import vueButton from "@/components/form/VueButton.vue";
    import vueInputDate from "@/components/form/VueInputDate.vue";

    const inputForm = ref({
        name: null,
        last_name: null,
        email: null,
        receipt_date: null,
        record_type: 'Доверенность'
    });

    const error = ref(null);
    const isDisabled = ref(false);

    const emit = defineEmits(['addMessage']);

    const add = async () => {
        error.value = null;
        try {
            isDisabled.value = true;
            let {data} = await notariesApi.storeMessages(inputForm.value);
            emit('addMessage', data)
        } catch (e) {
            error.value = e.response.data;
            isDisabled.value = false;
            return false;
        } finally {
            isDisabled.value = false;
        }
    };
</script>

<template>
    <form @submit.prevent="add" method="post" autocomplete="off" class=" border border-gray-400 px-4 py-6 rounded-lg shadow-lg">
        <vue-input id="name" type="string" labelText="Имя" v-model="inputForm.name"></vue-input>
        <vue-input id="last_name" type="string" labelText="Фамиля" v-model="inputForm.last_name"></vue-input>
        <vue-input id="email" type="email" labelText="E-mail" v-model="inputForm.email"></vue-input>
        <vue-input-date labelText="Дата приема" v-model="inputForm.receipt_date"></vue-input-date>
        <div class="flex items-baseline mb-6">
            <label for="record_type" class="sm:mr-2 text-gray-700 flex-shrink-0 mb-1 sm:mb-0 block">Вид документа:</label>
            <select v-model="inputForm.record_type" id="record_type" class="w-full outline-none pl-2 pr-7 py-1 text-base font-normal text-gray-700 bg-white border-b border-gray-400 transition rounded-sm ease-in-out focus:border-blue-600">
                <option value="Доверенность">Доверенность</option>
                <option value="Наследство">Наследство</option>
                <option value="Справка">Справка</option>
            </select>
        </div>
        <vue-button :isDisabled="isDisabled"></vue-button>
    </form>
</template>
