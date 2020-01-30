const app = new Vue({
  el:'#app',
  data:{
  
    info: [],
    searcedInfo: [],
    pagEmpleados: false,
    pagProveedores: false,
    pagTransaccion: false,
    pagBuscar: false,
    bob: true,
    showAddModal: false,
    showEditModal: false,
    showDeleteModal: false,
    errorMsg: "errorMSG",
    succesMsg: "succesMSG",
    nuevoEmp: {dni:"", nTarjeta:"", pinTarjeta:"", nombre:"", saldo:"", muni:""},
    nuevoPro: {muni:"", nombre:"", direccion:"", categoria:""},
    currentUser:{}, 
    searchName: ''  
  },

  methods: {
    getAll: function(){
      axios.get('http://localhost/test-vue/phps/getEmp.php')
      .then(response => (this.info = response.data.users))
    },

    getProv: function(){
      axios.get('http://localhost/test-vue/phps/getProv.php')
      .then(response => (this.info = response.data.users))
    },

    getTran: function(){
      axios.get('http://localhost/test-vue/phps/getTransaccion.php')
      .then(response => (this.info = response.data.users))
    },

    addEmpleado: function(){

      var formData = app.toFormData(app.nuevoEmp);
      axios.post("http://localhost/test-vue/phps/addEmp.php", formData)
      .then(function(response){
        console.log(response);
        app.nuevoEmp = {dni:"", nTarjeta:"", pinTarjeta:"", nombre:"", saldo:"", muni:""};
        if(response.data.error){
          app.errorMsg = response.data.message;
          console.log(app.errorMsg);
        }else{
          app.succesMsg = response.data.message;
          console.log(app.succesMsg);
          app.getAll();
        }
      });
    },

    addProveedor: function(){
      console.log(app.nuevoPro);
      var formData = app.toFormData(app.nuevoPro);
      axios.post("http://localhost/test-vue/phps/addProv.php", formData)
      .then(function(response){
        console.log(response);
        app.nuevoPro = {muni:"", nombre:"", direccion:"", categoria:""};
        if(response.data.error){
          app.errorMsg = response.data.message;
          console.log(app.errorMsg);
        }else{
          app.succesMsg = response.data.message;
          console.log(app.succesMsg);
          app.getProv();
        }
      });
    },

    editEmpleado: function(){

      var formData = app.toFormData(app.currentUser);
      axios.post("http://localhost/test-vue/phps/editarEmp.php", formData)
      .then(function(response){
        console.log(response);
        app.currentUser = {};
        if(response.data.error){
          app.errorMsg = response.data.message;
          console.log(app.errorMsg);
        }else{
          app.succesMsg = response.data.message;
          console.log(app.succesMsg);
          app.getAll();
        }
      });
    },

    deleteEmp: function(){

      var formData = app.toFormData(app.currentUser);
      axios.post("http://localhost/test-vue/phps/borrarEmp.php", formData)
      .then(function(response){
        console.log(response);
        app.currentUser = {};
        if(response.data.error){
          app.errorMsg = response.data.message;
          console.log(app.errorMsg);
        }else{
          app.succesMsg = response.data.message;
          console.log(app.succesMsg);
          app.getAll();
        }
      });
    },

    deleteProv: function(){

      var formData = app.toFormData(app.currentUser);
      axios.post("http://localhost/test-vue/phps/borrarProv.php", formData)
      .then(function(response){
        console.log(response);
        app.currentUser = {};
        if(response.data.error){
          app.errorMsg = response.data.message;
          console.log(app.errorMsg);
        }else{
          app.succesMsg = response.data.message;
          console.log(app.succesMsg);
          app.getProv();
        }
      });
    },

    selectUser: function(user){
      app.currentUser = user;
    },

    toFormData: function(obj){
      var formData = new FormData();
      for (var key in obj){
        formData.append(key, obj[key]);
      }
      return formData;
    }
  },

  computed: {

    searchEmp: function (){
      return app.info.filter((item) => item.nombre.toUpperCase().includes(app.searchName.toUpperCase()));
    }
  }
 
})