<template>
    <b-list-group-item :variant="variant">
        <b-row class="p-2" align-h="center">
            <b-col cols="12" md="3" class="text-center" >
                <b-img  blank  blank-color='#777'  width ="60" height="60"  rounded="circle" alt="img" class="m-1"></b-img>
            </b-col>
            <b-col cols="6" class="d-none d-md-block">
                <p class="mb-1">{{ name }}</p>
                <p class="text-muted small mb-1">{{ lastMessage }}</p>
            </b-col>
            <b-col cols="3"  class="d-none d-md-block" >
            <p class="text-muted small">{{ LastTime }}</p>  
            </b-col>
        </b-row>
    </b-list-group-item>
</template>
<script>
export default {
    props:[
        'variant'
    ],
    data(){
        return{
            name: 'Juan Ramos',
            lastMessage: 'Tú: Hasta Luego',
            LastTime:'1:37 pm',
           

        };
    },
}
</script>