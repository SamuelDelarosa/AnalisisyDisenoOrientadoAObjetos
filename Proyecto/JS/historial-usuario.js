var c_tabla=document.getElementById('h-u-c');
var h_tabla=document.getElementById('h-u-h');
window.addEventListener('load',function(e){

	h_tabla.innerHTML ='<th>ID prestamo</th><th>Tipo Material</th><th>ID Material</th><th>titulo</th><th>Fecha de prestamo</th><th>Fecha de entrega</th><th>Estado</th>';
	fetch('JS/PHP/historial-usuario.php')
	.then(res => res.json()).then(data => {
		console.log(data);
		llenado(data);
                    //tabla.innerHTML = '<tr><td>January</td><td>$100</td></tr>';
                    

           function llenado(data){
            c_tabla.innerHTML = ''
                  for (let valor of data){
                        console.log("hola")
                        //string +='<tr><td>January</td><td>$100</td></tr>';
                       // console.log(string);
             //tabla.innerHTML+="hola";
                        c_tabla.innerHTML +='<tr><td>'+valor.id_prestamo+'</td><td>'+valor.tipo+'</td><td>'+valor.id_mat+'</td><td>'+valor.titulo+'</td><td>'+valor.fp+'</td><td>'+valor.fe+'</td><td>'+valor.estado+'</td> </tr>';
                  }
           }
	})
})