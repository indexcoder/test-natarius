import api from './instance.js';

export default {
    getMessages(page) {
        return api.get('/api/messages?page=' + page);
    },
    storeMessages(params) {
        return api.post(`/api/messages`, params);
    }
}
