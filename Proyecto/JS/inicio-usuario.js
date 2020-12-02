var p_bole =document.getElementById('Boleta');
var p_nomb =document.getElementById('Nombre');
var p_ap =document.getElementById('ap');
var p_am =document.getElementById('am');
var p_correo =document.getElementById('correo');
var p_tele =document.getElementById('telefono');
var i_t =document.getElementById('img');
window.addEventListener('load',function(e){
	//console.log('hola');

	fetch('JS/PHP/usuario.php')
	.then(res => res.json()).then(data => {
		var boleta=data.boleta;
		var nombre=data.nombre;
		var ap=data.apPaterno;
		var am=data.apMaterno;
		var telefono=data.telefono;
		var correo=data.correo;
		var tipo=data.tipo;
			//console.log(data)
			p_bole.innerHTML= boleta;
			p_nomb.innerHTML=nombre;
			p_ap.innerHTML=ap; 
			p_am.innerHTML=am;
			p_correo.innerHTML=correo;
			p_tele.innerHTML=telefono;
			if(tipo==='Alumno'){
				i_t.innerHTML= '<img src="img/perfil.png">';
			}else{
				i_t.innerHTML= '<img src="img/profesor.png">';
			}

		})
})