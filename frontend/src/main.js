import { createApp } from 'vue';
import App from './App.vue';
import router from './router';


/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core';

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

/* import specific icons */
import { faUserSecret } from '@fortawesome/free-solid-svg-icons';

/* add icons to the library */
library.add(faUserSecret);

import GAuth from 'vue3-google-oauth2';

const gauthOption = {
    clientId: '138135484579-u8s9hma1lv9uje8rrmajv7otoeitp2ki.apps.googleusercontent.com',
    scope: 'profile email',
    prompt: 'consent',
    fetch_basic_profile:false
};
// Vue.use(GAuth, gauthOption)

import './main.css';

createApp(App).use(router,GAuth, gauthOption).component('font-awesome-icon', FontAwesomeIcon).mount('#app');
