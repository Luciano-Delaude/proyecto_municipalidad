<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          @click="leftDrawerOpen = !leftDrawerOpen"
          icon="menu"
          aria-label="Menu"
        />

        <q-toolbar-title>
          Mi municipio
        </q-toolbar-title>

        <div>{{ todaysDate }}</div>
      </q-toolbar>
    </q-header>

    <q-drawer
        v-model="leftDrawerOpen"
        show-if-above
        :width="200"
        :breakpoint="600"
      >
        <q-scroll-area class="fit bg-blue-2">
          <q-list padding class="menu-list">

            <q-item 
              to="/Prov"
              exact
              clickable 
              v-ripple>
              <q-item-section avatar>
                <q-icon name="people" />
              </q-item-section>
              <q-item-section>Empleados</q-item-section>
            </q-item>

            <q-item 
              to="/Search"
              exact
              clickable 
              v-ripple>
              <q-item-section avatar>
                <q-icon name="search" />
              </q-item-section>
              <q-item-section>Buscar</q-item-section>
            </q-item>

            <q-item 
              to="/Proveedores"
              clickable 
              v-ripple>
              <q-item-section avatar>
                <q-icon name="local_shipping" />
              </q-item-section>
              <q-item-section>Proveedores</q-item-section>
            </q-item>

            <q-item 
              to="/Transacciones"
              clickable 
              v-ripple>
              <q-item-section avatar>
                <q-icon name="shopping_cart" />
              </q-item-section>
              <q-item-section>Transacciones</q-item-section>
            </q-item>

          </q-list>
        </q-scroll-area>
      </q-drawer>

    <q-page-container>
      <keep-alive>
        <router-view />
      </keep-alive>
    </q-page-container>
  </q-layout>
</template>

<script>
import { date } from 'quasar'

export default {
  name: 'MyLayout',

  data () {
    return {
      leftDrawerOpen: false
    }
  },
  computed: {
    todaysDate(){
      let timeStamp = Date.now()
      return date.formatDate(timeStamp, 'dddd D MMMM YYYY')
    }
  }
}
</script>
