<template>
 <b-row class="h-100" >
        <b-col cols="8">
            <b-card
            footer-bg-variant="info"
            footer-border-variant="info"
            title="Conversación activa"
            class="h-100"
          
            >
            <b-card-text>Header and footers variants.</b-card-text>
                <div slot="footer">
                    <b-form class="my-3 mx-2">
                        <b-form-input class="text-center"           
                        type="text"
                        placeholder="Buscar contacto ..."
                        ></b-form-input> 
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