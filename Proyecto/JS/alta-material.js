	var l_formulario = document.getElementById('libro');
	var t_formulario = document.getElementById('tt');
	var c_formulario = document.getElementById('cd');
	var l_respuesta = document.getElementById('l-respuesta');
	var t_respuesta = document.getElementById('t-respuesta');
	var c_respuesta = document.getElementById('c-respuesta');
	l_formulario.addEventListener('submit',function(e){
		e.preventDefault();

		var datos= new FormData(l_formulario);

		fetch('JS/PHP/alta_l.php',{
			method: 'POST',
			body: datos
		})
		.then(res => res.json())
		.then(data => {
			//console.log(data)
			l_respuesta.innerHTML = 'Libro: '+data;

		})
	})


	t_formulario.addEventListener('submit',function(e){
		e.preventDefault();

		var datos= new FormData(t_formulario);

		fetch('JS/PHP/alta_t.php',{
			method: 'POST',
			body: datos
		})
		.then(res => res.json())
		.then(data => {
			//console.log(data)
			t_respuesta.innerHTML = 'Trabajo terminal:'+data;
		})
	})


	c_formulario.addEventListener('submit',function(e){
		e.preventDefault();

		var datos= new FormData(c_formulario);

		fetch('JS/PHP/alta_c.php',{
			method: 'POST',
			body: datos
		})
		.then(res => res.json())
		.then(data => {
			//console.log(data)
			c_respuesta.innerHTML = 'CD:'+data;
		})
	})