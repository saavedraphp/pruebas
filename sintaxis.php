<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
 
    
    <div id="app">
        {{ message }}
    <br>
        <spand v-bind:title="message">Titulo v-bind</spand>
        <p>

        <spand v-if="visible"> Ahora me vez</spand>
 
    </div>


    <div id="app-2">
        <ol>
            <li v-for="todo in todos">
            {{ todo.text }}
            </li>
        </ol>
    </div>

 
    <div id="app-3">
    <p>{{ message }}</p>
    <button v-on:click="reverseMessage">Reverse Message</button>
    </div>



 

    <div id="app-4">
        <ol >
            <todo-item
            v-for="item in golocinas"
            v-bind:todo="item"
            v-bind:key = "item.id"
            >/<todo-item>
        </ol>

        <input type="button" name="Adicionar" value="Adicionar" v-on:click="adicionar" >
    </div>



    <div class="static" id="app-6"
    v-bind:class="{ active: isActive, 'text-danger': hasError }"
    >adsa</div>



    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
<script>
Vue.config.devtools = true

    var app6 = new Vue({
        el:'#app-6',
    data: {
    isActive: true,
    hasError: false
    }

    })


Vue.component('todo-item',{
    props:['todo'],
    template: '<li>{{todo.text}} - {{ todo.precio }}</li>'
})






var app4 = new Vue({
    el:'#app-4',
    data:{
        golocinas:[
            {id:0,  text:'Vegetales', precio:10},
            {id:1,  text:'Carnes', precio:20},
            {id:2,  text:'Legunbres', precio:30}
        ]
    },

    methods:{
        adicionar: function(){
             
            this.golocinas.push({'id': 3, 'text': 'helados','precio':40 });

        }
    }



})

var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    visible:true,
  }
})


var app = new Vue({
  el: '#app-2',
  data: {
    
    todos:[
        { text:"Luis Saavedra"},
        { text:"Veronica Saavedra"},
        { text:"Rocio Saavedra"}
    ]

  }
})

 


var app = new Vue({
    el:'#app-3',
    data:{
        message:'Hello'
    },
    
    methods:{
        reverseMessage: function(){
            this.message = this.message.split('').reverse().join('');

        }
    }
})


 
</script>
</body>
</html>

