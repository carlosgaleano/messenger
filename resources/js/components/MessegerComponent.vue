<template>
  <b-container fluid style="height: calc(100vh - 57px)">
    <b-row class="h-100" no-gutters>
      <b-col class="h-100">
        <contact-form-component />
        <contact-list-component />
      </b-col>
      <b-col cols="8" class="h-100">
        <active-conversation-component v-if="selectedConversation" />
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  props: {
    user: Object,
  },

  mounted() {
    this.$store.commit("setUser", this.user);
    this.$store.dispatch("getConversations").then(() => {
      const conversationId = this.$route.params.conversationId;
      if (conversationId) {
        const conversation = this.$store.getters.getconversationByid(
          conversationId
        );
        this.$store.dispatch("getMessage", conversation);
      }
    });

    Echo.private(`users.${this.user.id}`).listen("MessageSent", (data) => {
      const message = data.message;
      //message.written_by_me=(this.userId == message.from_id);
      message.written_by_me = false;
      console.log("datos recibidos laravel echo", message);
      this.addMessage(message);
    });

    Echo.join("messenger")
      .here((users) => {
        console.log("online", users);
        users.forEach((user) => this.changeStatus(user, true));
        //
      })
      .joining((user) => this.changeStatus(user, true))

      .leaving((user) => this.changeStatus(user, false));
  },
  methods: {
    addMessage(message) {},
    changeStatus(user, status) {
      const index = this.$store.state.conversations.findIndex(
        (conversation) => {
          return conversation.contact_id == user.id;
        }
      );
      if (index >= 0)
        this.$set(this.$store.stateconversations[index], "online", status);
    },
  },

  computed: {
    selectedConversation() {
      return this.$store.state.selectedConversation;
    },
  },
};
</script>
