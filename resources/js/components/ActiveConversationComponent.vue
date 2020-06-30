<template>
 <b-row class="h-100 mt-0"  >
        <b-col cols="8">
            <b-card
            footer-bg-variant="light"
            footer-border-variant="dark"
            title="Conversación activa"
            class="h-100"
            >
           <message-conversation-component >
               Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisssque ante sollicitudin.

           </message-conversation-component >

           <message-conversation-component written-by-me >
               Lorem ipsum dolor sit amet consectetur adipisicing elit.

           </message-conversation-component>


                <div slot="footer">
                    <b-form class="mb-0"  >
                        <b-input-group  class="mt-3">
                            <b-form-input class="text-center"
                            type="text"
                            placeholder="Escribe un mensaje ..."
                            ></b-form-input>
                            <b-input-group-append>
                                <b-button variant="primary">Enviar</b-button>
                            </b-input-group-append>
                         </b-input-group>
                    </b-form>
                </div>
        </b-card>
    </b-col>
    <b-col cols="4">
    <b-img  blank  blank-color='#777'  width ="60" height="60"  rounded="circle" alt="img" class="m-1"></b-img>
        <p>Usuario seleccionado</p>
        <hr>
        <b-form-checkbox>
            Desactivar notificaciones
        </b-form-checkbox>
    </b-col>
</b-row>


</template>

<script>
export default {
    data(){
        return{

        };
    }
}
</script>
