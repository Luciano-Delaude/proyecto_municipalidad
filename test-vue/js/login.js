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
            console.log("Login es: ", lgn);
            console.log("Admin es: ", lgn.admin);
            console.log(formData);
            axios.post("http://app-env.mufuh4vug6.sa-east-1.elasticbeanstalk.com/controladores/funciones.controlador.php", formData)
            .then(function(response){
                console.log(response.data)
                console.log(response.data.admin)    
                if (response.data.admin.length == 0){
                    lgn.showAlert = true;
                }else{
                    lgn.showAlert = false;
                    lgn.info["muni"] = response.data.admin[0].id_municipio; /* numero de municipio */
                    sessionStorage.setItem('idMunicipio', lgn.info.muni);
                    sessionStorage.setItem('acceso',true);
                    sessionStorage.setItem('code',"zVp6m;K-@/-9y4^/");
                    window.location.replace("./index.html");
                }
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

    beforeCreate: function(){
        sessionStorage.setItem('acceso',false);
    }
})