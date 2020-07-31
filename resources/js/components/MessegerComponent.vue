<template>
   <b-container fluid style="height: calc(100vh - 57px); ">
    <b-row class="h-100" no-gutters>
        <b-col class="h-100">

            <contact-list-component
            @conversationSelected="changeActiveConversation($event)"
            :conversations="conversations"
              >

            </contact-list-component>

        </b-col>
        <b-col cols="8" class="h-100">
            <active-conversation-component
            v-if="selectConversation"
            :contact-id="selectConversation.contact_id"
            :contact-name="selectConversation.contact_name"
            :messages="messages"
            @messageCreated="addMessage($event)"
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
            messages: [],
            conversations:[]
        };
    },
    mounted(){
            this.getConversation();
            Echo.channel(`users.${this.userId}`)
            .listen('MessageSent', (data) => {

            const message = data.message;
            //message.written_by_me=(this.userId == message.from_id);
            message.written_by_me=false;
            console.log('datos recibidos laravel echo',message);
            this.addMessage(message);

            });
    },
    methods:{
        changeActiveConversation(conversation){
           //console.log('nueva conv seleccionada',conversation);
           this.selectConversation = conversation;
           this.getMessage();

        },
          getConversation(){
            axios.get('/api/conversations')
            .then((response)=>{
                console.log(response.data);
                this.conversations=response.data;
            });
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
       },
       addMessage(message){

           const conversation=this.conversations.find((convesation)=>{
               return convesation.contact_id== message.from_id ||
               convesation.contact_id== message.to_id
           });
            const autor =this.userId === message.from_id ? 'tú' : conversation.contact_name;
            conversation.last_message=`${autor}:${message.content}`;
            conversation.last_time=message.created_at;

           console.log('contaid',this.selectConversation.contact_id,message.to_id);
           if(this.selectConversation.contact_id == message.from_id
           || 'contaid',this.selectConversation.contact_id,message.to_id ){

                console.log(message)
                this.messages.push(message);

           }

       }
    }
}
</script>
