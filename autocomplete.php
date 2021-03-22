<!DOCTYPE html>
<html>
  <head>
    <title>Vue.js Autocomplete Textbox with PHP Mysql</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  </head>
  <body>
    <br />
    <br />
    <div class="container" id="autocomplete_app">
      <h3 align="center">Vue.js Autocomplete Textbox with PHP Mysql</h3>
      <br />
      <br />
      <br />
      <div class="form-row">
        
        <div class="form-group col-md-3">
        </div>
      
        <div class="form-group col-md-6">
          <auto-complete></auto-complete>
        </div>
      
        <div class="form-group col-md-3">
        </div>

      </div>
      
      

 

    </div>
  </body>
</html>

<script>

  Vue.component('auto-complete', {
    template:`
    <div>
      <div class="form-group col-md-6">
        <input type="text" placeholder="Enter Country name..." v-model="query" id="query" @keyup="getData()" autocomplete="off" class="form-control" />
      
      </div>
      
      <div class="form-group col-md-3">
        <input type="number" id="cantidad" placeholder="Cantidad" v-model="v_cantidad"   name="cantidad" class="form-control" />
      </div>

      <div class="form-group col-md-3">

      <input type="button"   value="Adicionar" @click="adicionarLista"   class="form-control" />
      </div>


      
      <div class="panel-footer" v-if="search_data.length">
        <ul class="list-group">
          <a href="#" class="list-group-item" v-for="data1 in search_data" @click="getName(data1)">{{ data1.id }} - {{ data1.country_code }} - {{ data1.country_name }}</a>
        </ul>
      </div>

    <table v-if="lista.length" border =1  width ="100%">
      <tr v-for="data1 in lista">
      <td> <input type="hidden" name="cantidad[]" v-bind:value="data1" > {{ data1.pais}}</td> 
      <td><p>{{ data1.cantidad}}</p> </td>
      <td><p v-on:click="eliminar(data1)"> X</p> </td>
      </tr>
    </table>

    </div>

    `,
    data:function(){
      return{
        query:'',
        search_data:[],
        lista:[],
        selected:{pais:"",id:"", cantidad:0},
        v_cantidad:'',
        //isDisabled:true

      }
    },
    methods:{
      getData:function(){
        this.search_data = [];
        axios.post('fetch.php', {
          query:this.query
        }).then(response => {
          this.search_data = response.data;

        });
      },
      getName:function(dato){
        this.query = dato.country_name;
        this.selected.pais = dato.country_name,
        this.selected.id = dato.id,
        this.search_data = [],
       // this.isDisabled=false,
        //$('#cantidad').focus();
        document.getElementById('cantidad').focus() 
        //this.lista.push(dato.country_name);
        
      },
      
      adicionarLista:function(name){
        
        if(this.selected.id ==='')
        {
          alert("tiene que selecionar un poducto");
          document.getElementById('query').focus() ;
          return false;
        }
        if(this.v_cantidad < 1 || this.v_cantidad =='')
        {
          alert("tiene que ingresar una cantidad");
          document.getElementById('cantidad').focus() ;
          return false;
        }
        

         this.lista.push({"id":this.selected.id,"pais":this.selected.pais,"cantidad":parseInt(this.v_cantidad)});
         this.selected.pais = "",
         this.selected.id = "",
         this.selected.cantidad = 0,

         this.query='',
         this.v_cantidad = ''
        // this.isDisabled=true
      },

      eliminar:function(name){
        
        this.lista.splice(this.lista.indexOf(name), 1);
        
        
      }


    }
  });

  var application = new Vue({
    el:'#autocomplete_app',
 
  });


</script>
 