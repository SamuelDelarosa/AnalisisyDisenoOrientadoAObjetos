var formulario = document.getElementById('buscar-bi');
var formulario2=document.getElementById('prueba');
var d_bole =document.getElementById('Boleta');
var d_nomb =document.getElementById('Nombre');
var d_ap =document.getElementById('ap');
var d_am =document.getElementById('am');
var d_correo =document.getElementById('correo');
var d_tele =document.getElementById('telefono');
var d_contra =document.getElementById('contrasena');
var d_tipo =document.getElementById('tipo');
var i_tipo=document.getElementById('img');
formulario.addEventListener('submit',function(e){
				e.preventDefault();
                var datos= new FormData(formulario);  
               // console.log(datos.get('consulta'));
                fetch('JS/PHP/buscar-usuario.php',{
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
                        if(data.tipo==='1'){
                        d_tipo.innerHTML ='<p>Tipo de cuenta:</p><input type="text" name="tipo" value="Alumno">';
                        i_tipo.innerHTML='<img src="img/perfil.png">';
                        }else if(data.tipo==='2'){
                         d_tipo.innerHTML ='<p>Tipo de cuenta:</p><input type="text" name="tipo" value="Profesor">';
                         i_tipo.innerHTML='<img src="img/profesor.png">';
                        }
                        }
                
                })
})

formulario2.addEventListener('submit',function(e){
				e.preventDefault();
				var datos= new FormData(formulario2);
				console.log('boton editar');
				fetch('JS/PHP/editar-usuario.php',{
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
				console.log('boton borrar');
				fetch('JS/PHP/eliminar-usuario.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                	console.log(data);
                })

})