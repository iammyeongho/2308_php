require('./bootstrap.js');

import { createApp } from 'vue'
import AppComponent from '../components/ApprComponent.vue'
import store from './store.js'

createApp({
    components: {
        AppComponent,
    }
})
    .use(store)
    .mount('#app')
