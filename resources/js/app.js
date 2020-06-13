require('./bootstrap');
window.Vue = require('vue');

import App from './App';
import { router } from './router/router.js'
import { store } from './vuex'

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router: router,
    store
});
