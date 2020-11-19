<template>
  <b-list-group>
    <contact-component
      v-for="conversation in conversations"
      :key="conversation.id"
      :conversation="conversation"
      :selected="selectedConversation.id === conversation.id"
      @click.native="selectConversation2(conversation)">
    </contact-component>

    <!--  <contact-component variant="dark">
        </contact-component>
        <contact-component variant="">
        </contact-component>
        <contact-component variant="secondary">
        </contact-component> -->
  </b-list-group>
</template>

<script>
export default {
  props: {
    conversations: Array,
  },

  methods: {
    selectConversation(conversation) {

     this.$store.commit('selectConversation', conversation);
     // eventBus.$emit('example',conversation);
    }
  },
  computed:{
      selectedConversation(){
          return this.$store.state.selectedConversation;
      }
  }
};
</script>
