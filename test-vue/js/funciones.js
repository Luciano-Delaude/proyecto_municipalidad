const app = new Vue({
  el:'#app',
  data:{
  
    info: [],
    pagEmpleados: false,
    pagProveedores: false,
    pagTransaccion: false,
    pagBuscar: false,
    bob: true,
    acceso: sessionStorage.getItem('acceso'),
    showAddModal: false,
    showEditModal: false,
    showDeleteModal: false,
    editE: false,
    editP: false,
    showTotal: false,
    errorMsg: "errorMSG",
    succesMsg: "succesMSG",
    nuevoEmp: {dni:"", nTarjeta:"", pinTarjeta:"", nombre:"", saldo:"", muni: sessionStorage.getItem('idMunicipio')},
    nuevoPro: {muni:sessionStorage.getItem('idMunicipio'), nombre:"", direccion:"", categoria:"", funcion:""},
    currentUser:{}, 
    searchName: '',
    tarea: {funcion:""},
    total: 0,
    code: "zVp6m;K-@/-9y4^/",
    rCode: "",
    //empleado success
    toast: {on: false, code: `<div id="toast" class="toast bg-success " role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
              <div class="toast-header bg-success">
                <strong class="mr-auto text-white">Empleado agregado con exito</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              </div>`},
    //Delete Emp success
    toast1: {on: false, code:`<div id="toast1" class="toast bg-danger " role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
              <div class="toast-header bg-danger">
                <strong class="mr-auto text-white">Empleado borrado con exito</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              </div>`},
    //Emp tran vigentes
    toast2: {on: false, code:`<div id="toast2" class="toast bg-danger " role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
              <div class="toast-header bg-danger">
                <strong class="mr-auto text-white">No se puede borrar el empleado, aun tiene transacciones vigentes</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              </div>`},
    //Emp editado
    toast3: {on: false, code:`<div id="toast3" class="toast bg-success " role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
              <div class="toast-header bg-success">
                <strong class="mr-auto text-white">Empleado editado con exito</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              </div>`},
    //Pro success
    toast4: {on: false, code: `<div id="toast4" class="toast bg-success " role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
              <div class="toast-header bg-success">
                <strong class="mr-auto text-white">Proveedor agregado con exito</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              </div>`},
    //Pro delete
    toast5: {on: false, code:`<div id="toast5" class="toast bg-danger " role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
              <div class="toast-header bg-danger">
                <strong class="mr-auto text-white">Proveedor borrado con exito</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              </div>`},
    //Pro tran vigente
    toast6: {on: false, code:`<div id="toast6" class="toast bg-danger " role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
              <div class="toast-header bg-danger">
                <strong class="mr-auto text-white">No se puede borrar el proveedor, aun tiene transacciones vigentes</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              </div>`},
    //Pro edit
    toast7: {on: false, code:`<div id="toast7" class="toast bg-success " role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
              <div class="toast-header bg-success">
                <strong class="mr-auto text-white">Proveedor editado con exito</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              </div>`}
  },

  methods: {
    getAll: function(){
      app.tarea.funcion = "getEmp";
      app.tarea['municipio'] = sessionStorage.getItem('idMunicipio');
      var formData = app.toFormData(app.tarea);
      axios.post("http://54.203.96.189/controladores/funciones.controlador.php", formData)
      .then(function(response){
        app.tarea = {funcion:""};
        app.info = response.data.users;
        setTimeout(function() { 
          app.toast.on = false;
          app.toast1.on = false;
          app.toast2.on = false;
          app.toast3.on = false;
        }, 4000); 
      });
    },

    getProv: function(){
      app.tarea.funcion = "getProv";
      app.tarea['municipio'] = sessionStorage.getItem('idMunicipio');
      var formData = app.toFormData(app.tarea);
      axios.post("./controladores/funciones.controlador.php", formData)
      .then(function(response){
        app.tarea = {funcion:""};
        app.info = response.data.users;
        setTimeout(function() { 
          app.toast4.on = false;
          app.toast5.on = false;
          app.toast6.on = false;
          app.toast7.on = false;
        }, 5000);
      });
    },

    getTran: function(){
      app.tarea.funcion = "getTran";
      app.tarea['municipio'] = sessionStorage.getItem('idMunicipio');
      var formData = app.toFormData(app.tarea);
      axios.post("./controladores/funciones.controlador.php", formData)
      .then(function(response){
        app.tarea = {funcion:""};
        app.info = response.data.users;
      });
    },

    addEmpleado: function(){
      app.nuevoEmp["funcion"]= "addEmp";
      var formData = app.toFormData(app.nuevoEmp);
      axios.post("./controladores/funciones.controlador.php", formData)
      .then(function(response){
        app.nuevoEmp = {dni:"", nTarjeta:"", pinTarjeta:"", nombre:"", saldo:"", funcion:"", muni: sessionStorage.getItem('idMunicipio')};
        if(response.data.error){
          app.errorMsg = response.data.message;
          console.log(app.errorMsg);
        }else{
          app.succesMsg = response.data.message;
          console.log(app.succesMsg);
          app.toast.on = true; 
          setTimeout(function() { 
            $("#toast").toast('show');
          }, 5); 
          app.getAll();
        }
      });
    },

    addProveedor: function(){
      app.nuevoPro["funcion"] = "addPro";
      var formData = app.toFormData(app.nuevoPro);
      axios.post("./controladores/funciones.controlador.php", formData)
      .then(function(response){
        app.nuevoPro = {nombre:"", direccion:"", categoria:"", funcion:"", muni: sessionStorage.getItem('idMunicipio')};
        if(response.data.error){
          app.errorMsg = response.data.message;
          console.log(app.errorMsg);
        }else{
          app.succesMsg = response.data.message;
          console.log(app.succesMsg);
          app.toast4.on = true; 
          setTimeout(function() { 
            $("#toast4").toast('show');
          }, 5); 
          app.getProv();
        }
      });
    },

    edit: function(){
      var formData = app.toFormData(app.currentUser);
      axios.post("./controladores/funciones.controlador.php", formData)
      .then(function(response){
        
        if(response.data.error){
          app.errorMsg = response.data.message;
          console.log(app.errorMsg);
        }else{
          app.succesMsg = response.data.message;
          console.log(app.succesMsg);
          if (app.currentUser.funcion == "editEmp"){
            app.toast3.on = true; 
            setTimeout(function() { 
            $("#toast3").toast('show');
            }, 5);
            app.getAll();
          } 
          if (app.currentUser.funcion == "editPro"){
            app.toast7.on = true; 
            setTimeout(function() { 
            $("#toast7").toast('show');
            }, 5);
            app.getProv();
          } 
        }
        app.currentUser = {};
      });
    },

    deleteEmp: function(){
      app.currentUser["funcion"] = "borrarEmp"
      var formData = app.toFormData(app.currentUser);
      axios.post("./controladores/funciones.controlador.php", formData)
      .then(function(response){
        if(response.data.error){
          app.errorMsg = response.data.message;
          console.log(app.errorMsg);
        }else if(response.data.error == null){
          console.log("No se puede borrar, aun tiene transacciones vigentes");
          app.toast2.on = true; 
          setTimeout(function() { 
            $("#toast2").toast('show');
          }, 5); 
          app.getAll();
        }else{
          app.succesMsg = response.data.message;
          console.log(app.succesMsg);
          app.toast1.on = true; 
          setTimeout(function() { 
            $("#toast1").toast('show');
          }, 5);  
          app.getAll();
        }
      });
      app.currentUser = {};
    },

    deleteProv: function(){
      app.currentUser["funcion"] = "borrarProv"
      var formData = app.toFormData(app.currentUser);
      axios.post("./controladores/funciones.controlador.php", formData)
      .then(function(response){
        app.currentUser = {};
        if(response.data.error){
          app.errorMsg = response.data.message;
          console.log(app.errorMsg);
        }else if(response.data.error == null){
          console.log("No se puede borrar el proveedor, aun tiene transacciones vigentes");
          app.toast6.on = true; 
          setTimeout(function() { 
            $("#toast6").toast('show');
          }, 5);
          app.getProv();
        }else{
          app.succesMsg = response.data.message;
          console.log(app.succesMsg);
          app.toast5.on = true; 
          setTimeout(function() { 
            $("#toast5").toast('show');
          }, 5);
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
    },

    calcular: function(){
      app.currentUser['funcion'] = "calcular";
      var formData = app.toFormData(app.currentUser);
      axios.post("./controladores/funciones.controlador.php", formData)
      .then(function(response){
        app.total = response.data.result[0].total
        app.showTotal = true;
        if(app.total == null) app.total = 0;
      });
    },

    salir: function(){
      sessionStorage.clear();
      window.location.replace("./login.html");
    }
  },

  computed: {

    searchEmp: function (){
      return app.info.filter((item) => item.nombre.toUpperCase().includes(app.searchName.toUpperCase()));
    }
  },

  mounted: function(){
    if(this.acceso){
      this.rCode = sessionStorage.getItem('code');
    }
  },

  destroyed: function(){
    sessionStorage.clear();
  }
 
})