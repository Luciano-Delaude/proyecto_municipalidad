<template>
  <q-page class="flex flex-center bg-blue-3">
    <div class="q-gutter-md" style="max-width: 300px">
      <q-input v-model="text" label="Numero provincia" />
    </div>  
    <div>
      <q-btn color="primary" label="Siguiente" to="/muni"/>
    </div>
  </q-page>
</template>

<script>
export default {
  
}
</script>
