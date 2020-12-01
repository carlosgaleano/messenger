require('./bootstrap');

import Vue from 'vue'

import {
    BootstrapVue,
    IconsPlugin
} from 'bootstrap-vue'
import store from './store'

Vue.use(BootstrapVue)

window.eventBus = new Vue();



// Install BootstrapVue

// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)


// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('contact-form-component', require('./components/contactFormComponent.vue').default);
Vue.component('profile-form-component', require('./components/ProfileFormCompoment.vue').default);
Vue.component('status-component', require('./components/StatusComponent.vue').default);
Vue.component('messenger-component', require('./components/MessegerComponent.vue').default);
Vue.component('message-conversation-component', require('./components/MessageConversationComponent.vue').default);
Vue.component('contact-component', require('./components/ContactComponent.vue').default);
Vue.component('contact-list-component', require('./components/ContactListComponent.vue').default);
Vue.component('active-conversation-component', require('./components/ActiveConversationComponent.vue').default);


const app = new Vue({
    el: '#app',
    store,
    methods: {
        logout() {
            document.getElementById('logout-form').submit();
        }


    }
});
