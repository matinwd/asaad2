import Vue from "vue";

Vue.component('template-builder', require('./panel').default);

Vue.component('text-block', require('./components/text').default);
Vue.component('text-slider-block', require('./components/text_slider').default);
Vue.component('file-block', require('./components/file').default);
Vue.component('slider-b-block', require('./components/slider_b').default);
Vue.component('tabs-block', require('./components/tabs').default);
Vue.component('accordions-block', require('./components/accordion').default);
Vue.component('counter-block', require('./components/counter').default);
Vue.component('feature-block', require('./components/feature').default);
Vue.component('recent-entity-block', require('./components/recent_entity').default);
Vue.component('form-block', require('./components/form').default);
Vue.component('reviews-block', require('./components/users_reviews').default);
