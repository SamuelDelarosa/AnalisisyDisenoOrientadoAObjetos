var formulario_L = document.getElementById('cmul');
var formulario_T = document.getElementById('cmut');
var formulario_C = document.getElementById('cmuc');
var tabla_l_h = document.getElementById('tabla-l-h');
var tabla_l_c = document.getElementById('tabla-l-c');
var tabla_t_h = document.getElementById('tabla-t-h');
var tabla_t_c = document.getElementById('tabla-t-c');
var tabla_c_h = document.getElementById('tabla-c-h');
var tabla_c_c = document.getElementById('tabla-c-c');

formulario_L.addEventListener('submit',function(e){
				e.preventDefault();
				tabla_l_h.innerHTML='<tr><th>id</th><th>nombre</th><th>Autor</th><th>Editorial</th><th>Estado</th></tr>';
                var datos= new FormData(formulario_L);  
                console.log(datos.get('cmul-t'));
                fetch('JS/PHP/consulta-material-usuario-l.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                	console.log(data);
                	var count = Object.keys(data).length;
                	console.log(count);
                	if(data==='Llena algun campo'||data==='Libro no existe'){
                	tabla_l_c.innerHTML ='<tr><td colspan="5">'+data+'</td></tr>'
                	}else if(count==5){
                		console.log('hi');
                	tabla_l_c.innerHTML ='<tr><td>'+data.idLibro+'</td><td>'+data.nombre+'</td><td>'+data.autor+'</td><td>'+data.edit+'</td><td>'+data.estado+'</td> </tr>';	
                	}else{
                		llenado(data);
                	
                	}
///////////////////////////////////
                	function llenado(data){
                    
                	tabla_l_c.innerHTML = ''
                	for (let valor of data){
                        console.log("hola")
                        //string +='<tr><td>January</td><td>$100</td></tr>';
                       // console.log(string);
 						 //tabla.innerHTML+="hola";
 						 
 						 	 tabla_l_c.innerHTML +='<tr><td>'+valor.idLibro+'</td><td>'+valor.nombre+'</td><td>'+valor.autor+'</td><td>'+valor.edit+'</td><td>'+valor.estado+'</td> </tr>';
 						 }}
 ///////////
                })


            })

formulario_T.addEventListener('submit',function(e){
				e.preventDefault();
				tabla_t_h.innerHTML='<tr><th>id</th><th>Titulo</th><th>Nombre corto</th><th>Autor</th><th>Director</th><th>Estado</th></tr>';
                var datos= new FormData(formulario_T);  
                console.log(datos.get('cmut-t'));
                fetch('JS/PHP/consulta-material-usuario-t.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                	console.log(data);
                	if(data==='Llena algun campo'||data==='Libro no existe'){
                	tabla_t_c.innerHTML ='<tr><td colspan="6">'+data+'</td></tr>'
                	}else{
                		llenado(data);
                	}
///////////////////////////////////
                	function llenado(data){
                    
                	tabla_t_c.innerHTML = ''
                	for (let valor of data){
                        console.log("hola")
                        //string +='<tr><td>January</td><td>$100</td></tr>';
                       // console.log(string);
 						 //tabla.innerHTML+="hola";
 						 
 						 	 tabla_t_c.innerHTML +='<tr><td>'+valor.idTT+'</td><td>'+valor.titulo+'</td><td>'+valor.nc+'</td><td>'+valor.autor+'</td><td>'+valor.director+'</td><td>'+valor.estado+'</td> </tr>';
 						 }}
 ///////////
                })


            })
////////////////////////////////////////////////////////////////////////
formulario_C.addEventListener('submit',function(e){
				e.preventDefault();
                var datos= new FormData(formulario_C);  
                tabla_c_h.innerHTML='<tr><th>id</th><th>Titulo</th><th>Estado</th></tr>';
                console.log(datos.get('cmuc-t'));

                fetch('JS/PHP/consulta-material-usuario-c.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                	console.log(data);
                	if(data==='Llena algun campo'||data==='CD no existe'){
                	tabla_c_c.innerHTML ='<tr><td colspan="3">'+data+'</td></tr>'
                	}else{
						llenado(data);
                	}
///////////////////////////////////
                	function llenado(data){
                    
                	tabla_c_c.innerHTML = ''
                	for (let valor of data){
                        console.log("hola")
                        //string +='<tr><td>January</td><td>$100</td></tr>';
                       // console.log(string);
 						 //tabla.innerHTML+="hola";
 						 
 						 	 tabla_c_c.innerHTML +='<tr><td>'+valor.idCD+'</td><td>'+valor.Nombre+'</td><td>'+valor.estado+'</td></tr>';
 						 }}
 ///////////
                })

            })
