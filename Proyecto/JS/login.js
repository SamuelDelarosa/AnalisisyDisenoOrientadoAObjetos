
	var formulario = document.getElementById('formulario_login');
	var respuesta = document.getElementById('advertencia');
		formulario.addEventListener('submit',function(e){
			e.preventDefault();
		console.log('me diste un click');
		var datos= new FormData(formulario);
		console.log(datos.get("numero_boleta"));
		fetch('JS/PHP/login.php',{
			method: 'POST',
			body: datos
		})
		.then(res => res.json())
		.then(data => {
			console.log(data)
			if(data==='Llena todos los campos'){
			respuesta.innerHTML ='<h2>Iniciar de sesi&oacute;n</h2><p class="error">'+data+'</p>';
			} else if(data==='Error de contrase&ntilde;a o usuario'){
			respuesta.innerHTML ='<h2>Iniciar de sesi&oacute;n</h2> <p class="error">'+data+'</p>';
			}else if(data==='Peticion no aceptada espere a ser aceptado'){
			respuesta.innerHTML='<h2>Iniciar de sesi&oacute;n</h2> <p class="espera">'+data+'</p>';
			}else if(data==='Entrar-Admin'){
				location.href ='inicio-administrador.html';
			}else if(data==='Entrar-bibli'){
				location.href ='inicio-bibliotecario.html';
			}else if(data==='Entrar-usua'){
				location.href ='inicio-usuario.html';
			}
		})
		})