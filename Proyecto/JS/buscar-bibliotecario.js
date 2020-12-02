var formulario = document.getElementById('buscar-bi');
var formulario2=document.getElementById('prueba');
var d_bole =document.getElementById('Boleta');
var d_nomb =document.getElementById('Nombre');
var d_ap =document.getElementById('ap');
var d_am =document.getElementById('am');
var d_correo =document.getElementById('correo');
var d_tele =document.getElementById('telefono');
var d_contra =document.getElementById('contrasena');
formulario.addEventListener('submit',function(e){
				e.preventDefault();
                var datos= new FormData(formulario);  
               // console.log(datos.get('consulta'));
                fetch('JS/PHP/buscar-bibliotecario.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                	console.log(data); 
                if(data==='No existe'){
					window.alert("No existe tu ID");
                }else{

                        
                    	d_bole.innerHTML='<p>Boleta:</p><input type="text" name="ID" value="'+data.ID+'"">';
                        d_nomb.innerHTML='<p>Nombre:</p><input type="text" name="nombre" value="'+data.nombre+'">';
                        d_ap.innerHTML='<p>Apellido paterno:</p><input type="text" name="aP" value="'+data.aP+'">'; 
                        d_am.innerHTML='<p>Apellido materno:</p><input type="text" name="aM" value="'+data.aM+'">';
                        d_correo.innerHTML='<p>Correo electr&oacute;nico:</p><input type="text" name="correo" value="'+data.correo+'">';
                        d_tele.innerHTML='<p>Tel&eacute;fono:</p><input type="text" name="telefono" value="'+data.telefono+'">';
                        d_contra.innerHTML='<p>Contrase&ntilde;a:</p><input type="text" name="contrasena" value="'+data.contrasena+'">';
                        }
                
                })
})

formulario2.addEventListener('submit',function(e){
				e.preventDefault();
				var datos= new FormData(formulario2);
				console.log(datos.get('ID'));
				fetch('JS/PHP/editar-bibliotecario.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                	console.log(data);
                })

})

formulario2.addEventListener('reset',function(e){
				e.preventDefault();
				var datos= new FormData(formulario2);
				console.log('hi');
				console.log(datos.get('ID'));
				fetch('JS/PHP/eliminar-bibliotecario.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                	console.log(data);
                })

})