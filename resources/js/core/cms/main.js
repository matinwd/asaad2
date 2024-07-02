import Vue from "vue";

import VuePersianDatetimePicker from 'vue-persian-datetime-picker';
import LocaleDatetimePicker from './modules/fdp_component';
import _ from 'lodash'
import jMoment from 'moment-jalaali'


import ElementUI from 'element-ui';
import locale from 'element-ui/lib/locale/lang/en'

Vue.use(ElementUI, {locale});

import VueStash from 'vue-stash'
import store from './store/store'
Vue.use(VueStash);

window._ = _;

window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.redirect = function (route) {
    window.location.href = route;
};
window.reload = function () {
    window.location.reload();
};


Vue.prototype._ = _;

Vue.component('date-picker', VuePersianDatetimePicker);
Vue.component('fdp', LocaleDatetimePicker);

Vue.filter('date', function (value, format = 'YYYY-MM-DD HH:mm') {
    if (value) {
        return jMoment(value).format(format);
    }
});

require('./mixins');

require('./modules');

console.debug(mixins)

const vm = new Vue({
    el: '#vApp',
    data: { store },
    methods: {
        handleAxiosError(error) {
        },
        handleError(error) {
        }
    },
    mixins: mixins
});

global.vm = vm;
