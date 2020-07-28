<template>
   <b-container fluid style="height: calc(100vh - 57px); ">
    <b-row class="h-100" no-gutters>
        <b-col class="h-100">

            <contact-list-component @conversationSelected="changeActiveConversation($event)"  ></contact-list-component>

        </b-col>
        <b-col cols="8" class="h-100">
            <active-conversation-component
            v-if="selectConversation"
            :contact-id="selectConversation.contact_id"
            :contact-name="selectConversation.contact_name"
            :messages="messages"
            ></active-conversation-component>
        </b-col>
    </b-row>
</b-container>
</template>
<script>
export default {
    props:{
        userId: Number
    },
    data(){
        return{
            selectConversation: null,
            messages: []
        };
    },
    mounted(){

            Echo.channel('example')
            .listen('MessageSent', (data) => {
            const message = data.message;
            message.written_by_me=(this.userId == message.from_id);
            this.messages.push(data.message);
            });
    },
    methods:{
        changeActiveConversation(conversation){
           //console.log('nueva conv seleccionada',conversation);
           this.selectConversation = conversation;
           this.getMessage();

        },
         getMessage(){
           axios.get('/api/messages',{
               params:{
                    contact_id:this.selectConversation.contact_id
               }

           })
        .then((response) => {
           // console.log(response.data)
            this.messages=response.data


        });

       }
    }
}
</script>
