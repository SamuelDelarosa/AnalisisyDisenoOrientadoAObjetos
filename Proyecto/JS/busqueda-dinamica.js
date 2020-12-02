var texto = document.getElementById('id-lib');
var tabla=document.getElementById('cuerpo-tabla-1');
var tabla1=document.getElementById('tit-tabla-1');
var form =document.getElementById('prueba');
form.addEventListener('submit',function(e){
	e.preventDefault();
    var datos = new FormData(form);
    console.log(datos.get('reser'));
    fetch('JS/PHP/entrega-l-b.php',{
        method:'POST',
        body: datos
    }).then(res=>res.json()).then(data=>{
        console.log(data);
        if(data==='Ingrese alguna id'|| data==='Error'){
            window.alert(data);
        }else{
            window.alert(data);
        }
    })
})
texto.addEventListener('keypress',function(e){

		tabla1.innerHTML='<tr><th>id de peticion</th><th>id</th><th>nombre</th><th>Autor</th><th>Editorial</th><th>Estado</th></tr>';
		console.log('hi');
		var datos = new FormData(form);
		console.log(datos.get('texto'));
		fetch('JS/PHP/buscar-libro-id.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                	console.log(data);
                	if(data==='Inicia la busqueda'||data==='Libro no existe'){
                	tabla.innerHTML ='<tr><td colspan="6">'+data+'</td></tr>'
                	}else{
                	llenado(data);
                	}

                	function llenado(data){
                    
                	tabla.innerHTML = ''
                	for (let valor of data){
                        console.log("hola")
                        //string +='<tr><td>January</td><td>$100</td></tr>';
                       // console.log(string);
 						 //tabla.innerHTML+="hola";
 						 
 						 	 tabla.innerHTML +='<tr><td>'+valor.idrl+'</td><td>'+valor.idLibro+'</td><td>'+valor.nombre+'</td><td>'+valor.Editorial+'</td><td>'+valor.Autor+'</td><td>'+valor.Estado+'</td> </tr>';
 						 }}
                })
	})
