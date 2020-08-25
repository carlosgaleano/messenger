<template>

<b-img  blank  :blank-color="online ? 'green' : 'gray'"  width ="10" 
:title="online? 'Conectado' : 'Desconectado'"
height="10"  rounded="circle" alt="img" ></b-img>

  <!--    <b-img v-if="conversation.online" blank  blank-color="green"  width ="10" height="10"  rounded="circle" alt="img" ></b-img>
     <b-img v-else blank  blank-color="gray"  width ="10" height="10"  rounded="circle" alt="img" ></b-img> -->
</template>

<script>
export default {
        props:{
        online: Boolean,
      
    },
    data(){
        return{         
      
        };
    }
   
    
}
</script>