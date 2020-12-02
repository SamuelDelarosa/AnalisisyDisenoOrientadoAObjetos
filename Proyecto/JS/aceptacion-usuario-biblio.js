var tabla = document.getElementById('perfil');
var tabla_cabecera = document.getElementById('tit-tabla-1');
var tabla_cuerpo =document.getElementById('cuerpo-tabla-1');
window.addEventListener('load',function(e){

	//console.log('hola');
	tabla_cabecera.innerHTML ='<tr><th>Peticion #</th><th>ID </th><th>Nombre</th><th>Apellido paterno</th> <th>Apellido materno</th> <th>Tipo</th></tr>';
	fetch('JS/PHP/acepta-usuario.php')
	.then(res => res.json()).then(data => {
		console.log(data);
                     var count = Object.keys(data).length;
                     console.log(count);
                  
                    llenado(data);
                    //tabla.innerHTML = '<tr><td>January</td><td>$100</td></tr>';
                    

           function llenado(data){
            tabla_cuerpo.innerHTML = ''
                  for (let valor of data){
                        console.log("hola")
                        //string +='<tr><td>January</td><td>$100</td></tr>';
                       // console.log(string);
             //tabla.innerHTML+="hola";
                        if(valor.tipo==='1'){
                        tabla_cuerpo.innerHTML +='<tr><td>'+valor.idBpeticion+'</td><td>'+valor.ID+'</td><td>'+valor.nombre+'</td><td>'+valor.aP+'</td><td>'+valor.aM+'</td><td>Alumno</td> </tr>';
                        }else if(valor.tipo==='2'){
                        tabla_cuerpo.innerHTML +='<tr><td>'+valor.idBpeticion+'</td><td>'+valor.ID+'</td><td>'+valor.nombre+'</td><td>'+valor.aP+'</td><td>'+valor.aM+'</td><td>Profesor</td> </tr>';
                        }
                  }
           }
		})
})