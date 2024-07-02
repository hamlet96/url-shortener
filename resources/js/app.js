import './bootstrap';

import {createApp} from 'vue';
import Homepage from './Pages/Homepage.vue';

createApp({})
    .component('homepage', Homepage)
    .mount('#app');
