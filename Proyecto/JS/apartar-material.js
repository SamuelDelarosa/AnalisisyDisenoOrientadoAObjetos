var formulario_b = document.getElementById('buscar-material');
var formulario_r=document.getElementById('prestamo-r');
var tipo;
formulario_b.addEventListener('submit',function(e){
				e.preventDefault();
				console.log('hi');
                var datos= new FormData(formulario_b);  
               // console.log(datos.get('consulta'));
                fetch('JS/PHP/buscar-material-r.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                	console.log(data); 
                	if(data.tipo==='Libro'){
                		tipo='Libro';
                	formulario_r.innerHTML ='<div ><p>ID:</p><input type="text" name="id-lib" value="'+data.ID+'"></div><div><p>Titulo:</p><input type="text" name="titulo-l" value="'+data.nombre+'"></div><div><p>Autor:</p><input type="text" name="autor-l" value="'+data.aut+'"></div><div ><p>Editorial:</p><input type="text" name="edit-l" value="'+data.edt+'"></div><div><button type="submit" class="mostrar-boton">Registrar</button></div>';
               } else if(data.tipo==='TT'){
               		tipo='TT';
               		formulario_r.innerHTML ='<div ><p>ID:</p><input type="text" name="id-t" value="'+data.ID+'"></div><div><p>Titulo:</p><input type="text" name="titulo-t" value="'+data.nombre+'"></div><div><p>Nombre corto:</p><input type="text" name="nc-t" value="'+data.nc+'"></div><div ><p>Autor:</p><input type="text" name="autor-t" value="'+data.aut+'"></div><div><p>Director:</p><input type="text" name="dir-t" value="'+data.dire+'"></div><div><button type="submit" class="mostrar-boton">Registrar</button></div>';
               }else if(data.tipo==='CD'){
               		tipo='CD';
               		formulario_r.innerHTML ='<div ><p>ID:</p><input type="text" name="id-c" value="'+data.ID+'"></div><div><p>Titulo:</p><input type="text" name="titulo-c" value="'+data.nombre+'"></div><div><button type="submit" class="mostrar-boton">Registrar</button></div>';
               }
           })
                })
formulario_r.addEventListener('submit',function(e){
				e.preventDefault();
				console.log('hi');
				var datos= new FormData(formulario_r);
				if(tipo==='Libro'){
				fetch('JS/PHP/registro-material-l.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {

                		window.alert(data);
                })
				}else if(tipo==='TT'){
				fetch('JS/PHP/registro-material-t.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                		window.alert(data);

                })
				}else if(tipo==='CD'){
				fetch('JS/PHP/registro-material-c.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                	window.alert(data);

                })
				}
				/*fetch('JS/PHP/registro-material-r.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {


                })*/

})