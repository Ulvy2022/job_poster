




import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

// add this
import './main.css';

/* import the fontawesome core */
import { library } from '@fortawesome/fontawesome-svg-core';

/* import font awesome icon component */
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

/* import specific icons */
import { faUserSecret } from '@fortawesome/free-solid-svg-icons';

/* add icons to the library */
library.add(faUserSecret);

//import crypto for decrypt code 

import vue3GoogleLogin from 'vue3-google-login';

import './main.css';
import 'animate.css';
// vue flage
import VueFlags from "@growthbunker/vueflags";

//vue country code
import VueCountryCode from "vue-country-code";

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import LoadScript from "vue-plugin-load-script";

createApp(App).use(router, vue3GoogleLogin, VueSweetalert2, VueFlags, VueCountryCode, LoadScript)
    .component('font-awesome-icon', FontAwesomeIcon).mount('#app');