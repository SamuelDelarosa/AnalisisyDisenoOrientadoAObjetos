//var respuesta = document.getElementById('perfil');
var p_bole =document.getElementById('Boleta');
var p_nomb =document.getElementById('Nombre');
var p_ap =document.getElementById('ap');
var p_am =document.getElementById('am');
var p_correo =document.getElementById('correo');
var p_tele =document.getElementById('telefono');
window.addEventListener('load',function(e){
	//console.log('hola');

	fetch('JS/PHP/bibliotecario.php')
	.then(res => res.json()).then(data => {
		var ID=data.ID;
		var nombre=data.nombre;
		var ap=data.apPaterno;
		var am=data.apMaterno;
		var correo=data.correo;
		var telefono=data.telefono;
			//console.log(data)
			p_bole.innerHTML= ''+ID+'';
			p_nomb.innerHTML=nombre;
			p_ap.innerHTML=ap; 
			p_am.innerHTML=am;
			p_correo.innerHTML=correo;
			p_tele.innerHTML=telefono;
		})
})