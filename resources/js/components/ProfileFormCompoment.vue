<template>
  <b-container>
    <b-form class="m-3" action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" v-model="csrfToken" >
      <b-form-group label="correo electrónico:">
        <b-form-input
          v-model="user.email"
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
          v-model="user.name"
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
        <b-form-file name="image" placeholder="Selecciona una nueva imagen" />
      </b-form-group>
       <b-img  alt="Imagen Actual" width ="60" height="60" v-model="user.image" rounded="circle" class="m-1"></b-img>


      <b-button type="submit" variant="primary">Guardar Cambios</b-button>
    </b-form>
  </b-container>
</template>

<script>
export default {
  props: {
    user: Object,
    csrfToken: String
  },
  data() {
    return {};
  },
  methods: {},
};
</script>
