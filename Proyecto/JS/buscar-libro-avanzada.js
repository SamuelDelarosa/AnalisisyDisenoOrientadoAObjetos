var form=document.getElementById('buscar-libro');
var tabla=document.getElementById('cuerpo-tabla-1');

var tabla1=document.getElementById('tit-tabla-1');

//var string='';
form.addEventListener('submit',function(e){
                tabla1.innerHTML='<tr><th>id</th><th>nombre</th></tr>';
				e.preventDefault();
                console.log("hi boton libro");
                var datos = new FormData(form);
                console.log(datos.get('titulo-libro'));
               // console.log(datos.get('consulta'));
                fetch('JS/PHP/buscar-libro-avanzada.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                    //console.log(data);<th>'+data.editorial+'</th><th>'+data.Autor1+', '+data.Autor2+', 'data.Autor3 +'</th>
                    console.log(data);
                     var count = Object.keys(data).length;
                    if(count===2){
                        tabla.innerHTML ='<tr><td>'+data.idLibro+'</td><td>'+data.nombre+'</td> </tr>';
                    }else{
                    llenado(data);
                    //tabla.innerHTML = '<tr><td>January</td><td>$100</td></tr>';
                    }    
                })

                function llenado(data){
                    
                	tabla.innerHTML = ''
                	for (let valor of data){
                        console.log("hola")
                        //string +='<tr><td>January</td><td>$100</td></tr>';
                       // console.log(string);
 						 //tabla.innerHTML+="hola";
                        tabla.innerHTML +='<tr><td>'+valor.idLibro+'</td><td>'+valor.nombre+'</td> </tr>';
                	}
                    
                }

	})

