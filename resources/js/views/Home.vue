<script setup>
    import {ref, onMounted} from "vue";
    import notariesApi from '@/api/notaries';
    import pagination from 'laravel-vue-pagination';
    import createForm from "@/components/Natary/CreateForm.vue";
    import messageList from "@/components/Natary/MessageList.vue";

    const error = ref(null);
    const loading = ref(false);
    const messages = ref(null);

    const getMessages = async (page = 1) => {
        try {
            loading.value = true;
            if (typeof page === 'undefined') page = 1;
            let {data} = await notariesApi.getMessages(page);
            messages.value = data;
        } catch (e) {
            error.value = e;
        } finally {
            loading.value = false;
        }
    };

    onMounted(getMessages);

    const mess = ref(null);
    function addMessage(message) {
        messages.value.data.unshift(message.data);
        mess.value = message;
    }
</script>
<template>
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 md:col-span-6">
            <create-form @addMessage="addMessage"></create-form>
        </div>
        <div class="col-span-12 md:col-span-6">
            <div v-if="loading">Loading ... </div>
            <div v-else-if="error">Error </div>
            <div v-else-if="messages && messages.data.length > 0">
                <h2 class="mb-2 text-xl text-gray-700">Ранее отправленные запросы:</h2>
                <message-list v-for="message in messages.data" :message="message"></message-list>
                <pagination :data="messages" @pagination-change-page="getMessages" :limit="-1">
                    <template #prev-nav>
                        <p class="flex items-center">
                            <svg class="fill-current w-6 h-auto text-gray-600" viewBox="0 0 24 24"><path fill="currentColor" d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z"></path></svg>
                            <span>Предыдущий</span>
                        </p>
                    </template>
                    <template #next-nav>
                        <p class="flex items-center">
                            <span>Следующий</span>
                            <svg class="fill-current w-6 h-auto text-gray-600" viewBox="0 0 24 24"><path fill="currentColor" d="M8.59,16.58L13.17,12L8.59,7.41L10,6L16,12L10,18L8.59,16.58Z"></path></svg>
                        </p>
                    </template>
                </pagination>
            </div>
        </div>
    </div>
</template>
