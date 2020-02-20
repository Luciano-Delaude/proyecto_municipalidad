const lgn = new Vue ({
    el: '#login',
    data: {
        admin: {user:"", pass:""},
        mensaje: "Bienvenido",
        info: [],
        showAlert: false
    },

    methods: {

        submit: function(){
            lgn.admin["funcion"] = "login";
            var formData = lgn.toFormData(lgn.admin);
            axios.post("http://localhost/muni/controladores/funciones.controlador.php", formData)
            .then(function(response){
                if (response.data.admin.length == 0){
                    lgn.showAlert = true;
                }else{
                    lgn.showAlert = false;
                    lgn.info["muni"] = response.data.admin[0].id_municipio; /* numero de municipio */
                    lgn.info["rol"] = response.data.admin[0].rol;
                    if (lgn.info.muni != null){
                        sessionStorage.setItem('idMunicipio', lgn.info.muni);
                        sessionStorage.setItem('acceso',true);
                        sessionStorage.setItem('code',"zVp6m;K-@/-9y4^/");
                        window.location.replace("http://localhost/muni/index.html");
                    }else if (lgn.info.rol == "super"){
                        sessionStorage.setItem('rol', lgn.info.rol);
                        sessionStorage.setItem('acceso',true);
                        sessionStorage.setItem('code',":4QNahW#%XB69p#qA");
                        window.location.replace("http://localhost/muni/gestion-municipios.html");
                    }
                }
            });
        },

        toFormData: function(obj){
            var formData = new FormData();
            for (var key in obj){
              formData.append(key, obj[key]);
            }
            return formData;
        },

        superAdm: function(){
            console.log("SUPER ADMIN");
        }
    },

    beforeCreate: function(){
        sessionStorage.setItem('acceso',false);
    }
})