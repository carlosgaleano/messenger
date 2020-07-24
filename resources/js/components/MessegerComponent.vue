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
            ></active-conversation-component>
        </b-col>
    </b-row>
</b-container>
</template>
<script>
export default {
    data(){
        return{
            selectConversation: null
        };
    },
    mounted(){

            console.log('tes 8881')
            Echo.channel('example')
            .listen('MessageSent', (e) => {
            console.log('prueba de echox ',e);
            });
    },
    methods:{
        changeActiveConversation(conversation){
           // console.log('nueva conv seleccionada',conversation);
           this.selectConversation = conversation;

        }
    }
}
</script>
