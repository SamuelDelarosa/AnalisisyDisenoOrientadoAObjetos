var formulario = document.getElementById('formulario_password');
	var respuesta = document.getElementById('texto');
	formulario.addEventListener('submit',function(e){
		e.preventDefault();
		console.log('me diste un click');
		var datos= new FormData(formulario);

		fetch('JS/PHP/password.php',{
			method: 'POST',
			body: datos
		})
		.then(res => res.json())
		.then(data => {
			console.log(data)
			if(data==='vacio'){
			respuesta.innerHTML = ' <h2>Recuperar contrase&ntilde;a</h2> <p class="error">Llena el campo</p>';
			} else if(data==='exito'){
				respuesta.innerHTML =' <h2>Recuperar contrase&ntilde;a</h2> <p class="correcto">Tu correo se envio</p>';
			
			} else{
			respuesta.innerHTML ='<h2>Recuperar contrase&ntilde;a</h2> <p class="error">Ocurrio un problema</p>';
			}
		})
	})
