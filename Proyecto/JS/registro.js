	var formulario = document.getElementById('formulario_registro');
	var respuesta = document.getElementById('Advertencia');
	formulario.addEventListener('submit',function(e){
		e.preventDefault();

		var datos= new FormData(formulario);
		var c_n= datos.get('nombre').length;
		
		
		
		fetch('JS/PHP/registro.php',{
			method: 'POST',
			body: datos
		})
		.then(res => res.json())
		.then(data => {
			console.log(data)
			if(data==='Datos registrados'){
			respuesta.innerHTML = ' <h2>Registrarse</h2> <p class="correcto">Tu peticion se a enviado espere a ser aceptada</p>';
			} else{
					respuesta.innerHTML ='<h2>Registrarse</h2> <p class="error">'+data+'</p>';
			}
		})
	})