require('./bootstrap');

require('alpinejs');

import { createApp }  from 'vue';
/* window.Vue = require('vue');
 */ 
import Searcher from './views/searcher.vue';
import App from './views/app.vue';


createApp(Searcher).mount('#searcher')
createApp(App).mount('#app')