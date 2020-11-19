<template>
  <b-container fluid style="height: calc(100vh - 57px)">
    <b-row class="h-100" no-gutters>
      <b-col class="h-100">
        <b-form class="my-3 mx-2">
          <b-form-input
            class="text-center"
            type="text"
            v-model="querySearch"
            placeholder="Buscar contacto ..."
          ></b-form-input>
        </b-form>
        <contact-list-component
          @conversationSelected="changeActiveConversation($event)"
          :conversations="conversationsFiltered"
        />
      </b-col>
      <b-col cols="8" class="h-100">
        <active-conversation-component
          v-if="selectConversation"
          :contact-id="selectConversation.contact_id"
          :contact-name="selectConversation.contact_name"
          :contact-image="selectConversation.contact_image"
          :my-image="myImageUrl"
          @messageCreated="addMessage($event)"
        />
      </b-col>
    </b-row>
  </b-container>
</template>
<script>
export default {
  props: {
    user: Object,
  },
  data() {
    return {
      conversations: [],
      querySearch: "",
    };
  },
  mounted() {
    this.getConversation();
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
    changeActiveConversation(conversation) {
      //console.log('nueva conv seleccionada',conversation);
      //this.selectConversation = conversation;
      this.getMessage();
    },
    getConversation() {
      axios.get("/api/conversations").then((response) => {
        console.log(response.data);
        this.conversations = response.data;
      });
    },
    getMessage() {
      axios
        .get("/api/messages", {
          params: {
            contact_id: this.selectConversation.contact_id,
          },
        })
        .then((response) => {
          // console.log(response.data)
          this.$store.commit("newMessagesList", response.data);
        });
    },
    addMessage(message) {
      const conversation = this.conversations.find((convesation) => {
        return (
          convesation.contact_id == message.from_id ||
          convesation.contact_id == message.to_id
        );
      });
      const autor =
        this.user.id === message.from_id ? "tú" : conversation.contact_name;
      conversation.last_message = `${autor}:${message.content}`;
      conversation.last_time = message.created_at;

      console.log("contaid", this.selectConversation.contact_id, message.to_id);
      if (
        (this.selectConversation.contact_id == message.from_id || "contaid",
        this.selectConversation.contact_id,
        message.to_id)
      ) {
        console.log(message);
        this.$store.commit("addMessage", message);
      }
    },
    changeStatus(user, status) {
      const index = this.conversations.findIndex((conversation) => {
        return conversation.contact_id == user.id;
      });
      if (index >= 0) this.$set(this.conversations[index], "online", status);
    },
  },

  computed: {
    seletedConversation() {
      return this.$store.state.selectConversation;
    },
    conversationsFiltered() {
      return this.conversations.filter((conversation) =>
        conversation.contact_name
          .toLowerCase()
          .includes(this.querySearch.toLowerCase())
      );
    },

    myImageUrl() {
      return `/users/${this.user.image}`;
    },
  },
};
</script>
