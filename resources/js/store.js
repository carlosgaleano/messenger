import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

export default new Vuex.Store({
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
                to_id: context.state.selectedConversation.contact_id,
                content: newMessage
            };
            //console.log('parametrosADD', params,context.state.selectedConversation)
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
