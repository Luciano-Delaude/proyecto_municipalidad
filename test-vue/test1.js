const app = new Vue({
    el:'#app',
    data () {
        return {
          info: [],
          active: false,
          pagEmpleados: false,
          bob: true
        }
      },
    methods: {
        getAll(){
            this.pagEmpleados = true;
            this.bob = false;
            console.log("GET");
            axios.get('http://localhost/test-vue/phps/api.php')
            .then(response => (this.info = response.data.empleados))
            console.log(this.info)
        }
    }
})