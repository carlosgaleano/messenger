require('./bootstrap');

import Vue from 'vue'
import Vuex from 'vuex'
import {
    BootstrapVue,
    IconsPlugin
} from 'bootstrap-vue'

Vue.use(Vuex)
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


const store = new Vuex.Store({
    state: {
        selectedConversation: null,
        messages: [],
        conversations: [],
        querySearch: '',
        user: null


    },
    mutations: {
        newMessagesList(state, messages) {
            state.messages = messages;
        },
        setUser(state, user) {
            state.user = user;
        },
        addMessage(state, message) {
            const conversation = state.conversations.find((convesation) => {
                return (
                    convesation.contact_id == message.from_id ||
                    convesation.contact_id == message.to_id
                );
            });
            const autor =
                state.user.id === message.from_id ? "tú" : conversation.contact_name;
            conversation.last_message = `${autor}:${message.content}`;
            conversation.last_time = message.created_at;

            console.log("contaid", state.selectedConversation.contact_id, message.to_id);
            if (
                (state.selectedConversation.contact_id == message.from_id || "contaid",
                    state.selectedConversation.contact_id,
                    message.to_id)
            ) {
                console.log(message);
                state.messages.push(message);
            }

        },
        selectConversation(state, conversation) {
            state.selectedConversation = conversation;
        },
        newQuerySearch(stare, newValue) {
            state.querySearch = newValue;
        },
        newConversationList(state, Conversations) {
            state.conversations = Conversations;
        }

    },
    actions: {
        getMessage(context, conversation) {
            axios
                .get("/api/messages", {
                    params: {
                        contact_id: conversation.contact_id,
                    },
                })
                .then(response => {
                    context.commit("newMessagesList", response.data);
                    context.commit("selectConversation", conversation);
                });
        },
        getConversations(context, ) {
            axios.get("/api/conversations").then((response) => {
                context.commit("newConversationList", response.data);
            });
        },
        postMessage(context, newMessage) {
            const params = {
                to_id: context.state.selectedConversation.contactId,
                content: newMessage
            };
            console.log('parametrosADD', params,context.state.selectedConversation)
            axios.post('/api/messages', params)
                .then((response) => {
                    if (response.data.success) {
                        newMessage = '';
                        const message = response.data.message;
                        message.written_by_me = true;
                        context.commit('addMessage', message);
                        //  this.$emit('messageCreated', message);
                    }
                });


        }


    },
    getters: {
        conversationsFiltered(state) {
            console.log('conversationsFiltered fired');
            return state.conversations.filter((conversation) =>
                conversation.contact_name
                .toLowerCase()
                .includes(state.querySearch.toLowerCase())
            );
        },

    }

})

const app = new Vue({
    el: '#app',
    store,
    methods: {
        logout() {
            document.getElementById('logout-form').submit();
        }


    }
});
