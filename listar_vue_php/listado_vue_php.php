
 
<div id='vueapp'>
 
			<div>
				<p>
					Nombre: <input v-model="nombre"  name="nombre"/>
				</p>
				<p>
					Tel&eacute;fono: <input v-model="telefono" name="telefono"/>
				</p>
				<p>
					<button v-on:click="enviar">Enviar</button>
				</p>
			</div>

			<h2>Listado de registros</h2>
			<div>
				<div v-for="r in data">
					<div>{{ r.nombre }}, {{ r.telefono }}</div>
				</div>
			</div>
 
		</div>
 
		<!-- Importamos Vue.js (Siempre al final) -->
		<script src="https://unpkg.com/vue"></script>
		<script src="https://unpkg.com/vue-resource"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


		<!-- Importamos nuestra aplicación -->
		<script>
        var app = new Vue({
        el: '#vueapp',
        data: {
            nombre: '',
            telefono: '',
            data: []
            },
        methods: {
           
            cargar_lista:function(){
               axios.post('http://localhost/pruebas/listar_vue_php/data.php')
                .then(response => {
                this.data = response.data;
                }) 
                
            },
            enviar:function()
            {  
 
                axios.post('http://localhost/pruebas/listar_vue_php/data.php',{
                nombre:this.nombre, telefono:this.telefono})
                .then(response=>{
                    console.log(response.data);
                    this.data = response.data;
                    this.nombre="";
                    this.telefono="";                    
                })
    
		 
            },




        },


        created: function () 
            {
                this.cargar_lista();
            }
        });
        </script>