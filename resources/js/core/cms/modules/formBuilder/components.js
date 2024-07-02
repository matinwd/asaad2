import Vue from "vue";


import Animate from 'vue2-animate/dist/vue2-animate.min.css'
Vue.use(Animate)

Vue.component('form-builder', require('./panel').default);
Vue.component('form-data', require('./form_data').default);