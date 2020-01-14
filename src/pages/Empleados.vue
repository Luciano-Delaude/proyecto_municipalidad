<template>
  <q-page class="bg-blue-3 column">

    <div class="q-pa-md q-gutter-sm">
      <q-btn round color="green" glossy icon="add" />     
    </div>
    
    <div class="q-pa-md">
    <q-table
      title="Lista empleados"
      :data="data"
      :columns="columns"
      row-key="name"
      binary-state-sort
    >
      <template v-slot:body="props">
        <q-tr :props="props">

          <q-td key="nombre" :props="props">
            {{ props.row.name }}
            <q-popup-edit v-model="props.row.name">
              <q-input v-model="props.row.name" dense autofocus counter />
            </q-popup-edit>
          </q-td>
          <q-td key="dni" :props="props">{{ props.row.dni }}</q-td>
          
          <q-td key="nTarjeta" :props="props">{{ props.row.nTarjeta }}</q-td>

          <q-td key="municipio" :props="props">{{ props.row.municipio }}</q-td>

          <q-td key="saldo" :props="props">
            {{ props.row.saldo }}
            <q-popup-edit v-model="props.row.protein" title="Actualizar saldo" buttons>
              <q-input type="number" v-model="props.row.saldo" dense autofocus />
            </q-popup-edit>
          </q-td>

        </q-tr>
      </template>
    </q-table>
  </div>
  </q-page>
</template>

<script>
export default {
  data () {
    return {
      columns: [
        {
          name: 'nombre',
          required: true,
          label: 'Nombre y apellido',
          align: 'left',
          field: row => row.name,
          format: val => `${val}`,
          sortable: true
        },
        { name: 'dni', align: 'center', label: 'DNI', field: 'dni'},
        { name: 'nTarjeta', label: 'N Tarjeta', field: 'nTarjeta', style: 'width: 10px' },
        { name: 'municipio', label: 'Municipio', field: 'municipio' },
        { name: 'saldo', label: 'Saldo', field: 'saldo', sortable: true },
      ],
      data: [
        {
          name: 'Anzorena Santiago',
          dni: 38953984,
          nTarjeta: 2001013438953984,
          municipio: 134,
          saldo: 8000,
        },
        {
          name: 'Delaude Luciano',
          dni: 36123456,
          nTarjeta: 2001013436123456,
          municipio: 134,
          saldo: 8000,
        },
        {
          name: 'Domina Leandro',
          dni: 35796172,
          nTarjeta: 2001013435796172,
          municipio: 134,
          saldo: 8000,
        }
      ]
    }
  }
}
</script>
