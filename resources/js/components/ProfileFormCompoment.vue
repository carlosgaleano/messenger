<template>
  <b-container>
    <b-form class="m-3" action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" v-model="csrfToken" />

      <b-form-group label="correo electrónico:">
        <b-form-input
          v-model.trim="user.email"
          name="email"
          type="email"
          disabled
          placeholder="Ingresar tu correo"
        ></b-form-input>
      </b-form-group>

      <b-form-group label="Nombre:">
        <b-form-input
          name="name"
          type="text"
          required
          v-model.trim="user.name"
          placeholder="Ingresa tu nombre"
        ></b-form-input>
      </b-form-group>

      <b-form-group label="Nueva contraseña (sólo si se desea modificar):">
        <b-form-input
          name="password"
          type="password"
          placeholder="Ingresa tu nueva contraseña"
        ></b-form-input>
      </b-form-group>

      <b-form-group label="Ingresar nueva imagen ">
        <b-img
          :src="image"
          width="60"
          height="60"
          rounded="circle"
          alt="Imagen de perfil"
          tittle="Imagen actual"
          class="m-1"
        ></b-img>
        <b-form-file name="image" placeholder="Selecciona una nueva imagen" />
      </b-form-group>


      <b-button type="submit" variant="primary">Guardar Cambios</b-button>
    </b-form>
  </b-container>
</template>

<script>
import { required, minLength, between } from "vuelidate/lib/validators";

export default {
  props: {
    user: Object,
    csrfToken: String,
  },
  data() {
    return { };
  },
  methods: {
    setName() {
       console.log(this.name2);
       this.name2
        this.$v.name2.$touch();
  /*     this.name2 = value;
      this.$v.name2.$touch(); */
    },
  },
  computed: {
    image() {
      return `/users/${this.user.image}`;
    },

  },
  validations: {
    name2: { required, minLength: minLength(6) },
  },
};
</script>
