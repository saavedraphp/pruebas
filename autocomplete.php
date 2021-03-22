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
      <input type="text" placeholder="Enter Country name..." v-model="query" @keyup="getData()" autocomplete="off" class="form-control" />
      </div>
      
      <div class="form-group col-md-6">
      <input type="text" placeholder="Cantidad"    class="form-control" />
      </div>
      
      <div class="panel-footer" v-if="search_data.length">
        <ul class="list-group">
          <a href="#" class="list-group-item" v-for="data1 in search_data" @click="getName(data1.country_name)">{{ data1.id }} - {{ data1.country_code }} - {{ data1.country_name }}</a>
        </ul>
      </div>

    <table v-if="lista.length">
      <tr v-for="data1 in lista">
      <td @click="calculo(data1)"> <input type="text" name="cantidad[]" v-bind:value="data1"> {{ data1}}</td> 
      </tr>
    </table>

    </div>

    `,
    data:function(){
      return{
        query:'',
        search_data:[],
        lista:[],

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
      getName:function(name){
        this.query = name;
        this.search_data = [];
        this.lista.push(name);
        
      },
      
      calculo:function(name){
        alert(name)
        
      }

    }
  });

  var application = new Vue({
    el:'#autocomplete_app',
 
  });


</script>
<div class="form-row">
    <div class="form-group col-md-6">
      <label for="producto">Producto *</label>
      <input type="text" class="form-control" v-model="producto" name="producto" id="producto" placeholder="Nombre" value="">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Codigo</label>
      <input type="text" class="form-control" name="codigo_producto" id="inputPassword4" placeholder="Codigo" value="">
    </div>
  </div>