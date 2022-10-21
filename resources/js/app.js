import './bootstrap';
import App from './App.vue';
import router from './router';
import {createApp} from 'vue';

import '../css/pagination.scss';

createApp(App).use(router).mount('#app');
