require('./bootstrap');

import Vue from 'vue'

import {
    BootstrapVue,
    IconsPlugin
} from 'bootstrap-vue'
import store from './store'

import VueRouter from 'vue-router'

Vue.use(BootstrapVue);
Vue.use(VueRouter);
Vue.use(IconsPlugin);

import MessengerComponent from './components/MessegerComponent.vue';
import ExampleComponent from './components/Example2Component.vue';



window.eventBus = new Vue();



// Install BootstrapVue

// Optionally install the BootstrapVue icon components plugin



// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
Vue.component('contact-form-component', require('./components/contactFormComponent.vue').default);
Vue.component('profile-form-component', require('./components/ProfileFormCompoment.vue').default);
Vue.component('status-component', require('./components/StatusComponent.vue').default);
/* Vue.component('messenger-component', require('./components/MessegerComponent.vue').default);
 */Vue.component('message-conversation-component', require('./components/MessageConversationComponent.vue').default);
Vue.component('contact-component', require('./components/ContactComponent.vue').default);
Vue.component('contact-list-component', require('./components/ContactListComponent.vue').default);
Vue.component('active-conversation-component', require('./components/ActiveConversationComponent.vue').default);


const routes = [
    { path: '/chat', component: MessengerComponent },
    { path: '/chat/:conversationId', component: MessengerComponent },
    { path:'/example' , component: ExampleComponent   }
  ]

  const router = new VueRouter({
    routes,
    mode: 'history'
  })


const app = new Vue({
    el: '#app',
    store,
    router,
    methods: {
        logout() {
            document.getElementById('logout-form').submit();
        }


    }
});
