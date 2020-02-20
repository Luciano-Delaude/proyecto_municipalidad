const gm = new Vue ({
    el: '#superadmin',
    data: {
        acceso: sessionStorage.getItem('acceso'),
        code: ":4QNahW#%XB69p#qA",
        rCode: "",
        info: [],
        tarea: "getMuni"
    },

    methods: {
        getMunis: function(){
            console.log("GET MUNIS");
            this.tarea['funcion'] = "getMuni";
            console.log(this.tarea.funcion);
            var formData = this.toFormData(this.tarea);
            axios.post("http://localhost/muni/controladores/funciones.controlador.php", formData)
            .then(function(response){
              this.tarea = {funcion:""};
              this.info = response.data.users;
              console.log(this.info); 
            });
        },

        toFormData: function(obj){
            var formData = new FormData();
            for (var key in obj){
              formData.append(key, obj[key]);
            }
            return formData;
        }
    },

    beforeMount: function(){
        if(this.acceso){
          this.rCode = sessionStorage.getItem('code');
        }
        this.getMunis();
      },
    
      destroyed: function(){
        sessionStorage.clear();
      }

})