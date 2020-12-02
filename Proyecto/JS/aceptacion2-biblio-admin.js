var form=document.getElementById('prueba');
form.addEventListener('submit',function(e){
				e.preventDefault();
				console.log('me diste un click');
				var datos = new FormData(form);
				fetch('JS/PHP/aceptacion-bibliotecario.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                	console.log(data);
                	if(data==='Aceptado'){
                		location.reload();
                	}else{
                		console.log('hola');
                	}
                })
			})