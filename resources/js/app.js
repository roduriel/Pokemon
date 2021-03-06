require('./bootstrap');

require('alpinejs');

import { createApp }  from 'vue';
/* window.Vue = require('vue');
 */ 
import App from './views/app.vue';
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

const pokAapp = createApp(App)

pokAapp.use(VueSweetalert2);
pokAapp.mount('#poke');
/* createApp(App).mount('#poke') */