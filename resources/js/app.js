require("./bootstrap");
import "bootstrap-vue/dist/bootstrap-vue.css";

// hover css
import "hover.css/css/hover-min.css";

import AOS from "aos";
import "aos/dist/aos.css";

import { InertiaApp } from "@inertiajs/inertia-vue";

import Vue from "vue";

// meta tools
import VueMeta from "vue-meta";

import BootstrapVue from "bootstrap-vue";
import FlashMessage from "@smartweb/vue-flash-message";
import VueCarousel from "vue-carousel";

//global registration form wizard
import VueFormWizard from "vue-form-wizard";
import "vue-form-wizard/dist/vue-form-wizard.min.css";

// particle js
import VueParticles from "vue-particles";

import fullscreen from "vue-fullscreen";

// dropzone js
// import vueDropzone from 'vue2-dropzone'
// import 'vue2-dropzone/dist/vue2Dropzone.min.css'

// untuk local storage
import Storage from "vue-ls";

// untuk moment js
const moment = require("moment");
require("moment/locale/id");

Vue.use(VueMeta);

Vue.use(require("vue-moment"), {
    moment
});

// untuk dorm wizard
Vue.use(VueParticles);

// untuk dorm wizard
Vue.use(VueFormWizard);

// untuk carousel
Vue.use(VueCarousel);

// bootstrap framework
Vue.use(BootstrapVue);

// untuk flash message
Vue.use(FlashMessage);
Vue.use(InertiaApp);

// untuk fullscreen
Vue.use(fullscreen);

// untuk localstorage
Vue.use(Storage);

Vue.mixin(require("./base"));

const app = document.getElementById("app");

new Vue({
    metaInfo: {
        titleTemplate: title =>
            title ? `${title} - Sinarmas Hana Finance` : "Sinarmas Hana Finance"
    },
    created() {
        AOS.init();
    },
    render: h =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: name =>
                    import(`./Pages/${name}`).then(module => module.default)
            }
        })
}).$mount(app);
