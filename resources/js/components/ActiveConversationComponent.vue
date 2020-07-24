<template>
 <b-row class="h-100 mt-0"  >
        <b-col cols="8">
            <b-card
            footer-bg-variant="light"
            footer-border-variant="dark"
            title="Conversación activa"
            class="h-100"
            >
           <message-conversation-component
           v-for="message in messages"
           :key="message.id"
           :writtenByMe="message.written_by_me"
           >
            {{ message.content}}
           </message-conversation-component >


                <div slot="footer">
                    <b-form class="mb-0" @submit.prevent="postMessage" autocomplete="off" >
                        <b-input-group  class="mt-3">
                            <b-form-input class="text-center"
                            type="text"
                            v-model="newMessage"
                            placeholder="Escribe un mensaje ..."
                            ></b-form-input>
                            <b-input-group-append>
                                <b-button type="submit" variant="primary">Enviar</b-button>
                            </b-input-group-append>
                        </b-input-group>
                    </b-form>
                </div>
        </b-card>
    </b-col>
    <b-col cols="4">
    <b-img  blank  blank-color='#777'  width ="60" height="60"  rounded="circle" alt="img" class="m-1"></b-img>
        <p>{{ contactName}}</p>
        <hr>
        <b-form-checkbox>
            Desactivar notificaciones
        </b-form-checkbox>
    </b-col>
</b-row>


</template>

<script>
export default {
    props:{
        contactId: Number,
        contactName: String
    },
    data(){
        return{
            messages:[],
            newMessage: '',

        };
    },
    mounted(){
        this.getMessage();

    },
    methods:{
       getMessage(){
           axios.get('/api/messages',{
               params:{
                    contact_id:this.contactId
               }

           })
        .then((response) => {
            //console.log(response.data)
            this.messages=response.data


        });

       },
       postMessage(){
           const params={
               to_id:2,
               content:this.newMessage
           };
        axios.post('/api/messages',params)
        .then((response) => {
         if(response.data.success){
             this.newMessage='';
             this.getMessage();


         }
        });

       }
    },
    watch:{
        contactId(value){
            console.log(`contactId =>${this.contactId}` );
            this.getMessage();
        }
    }
}
</script>
