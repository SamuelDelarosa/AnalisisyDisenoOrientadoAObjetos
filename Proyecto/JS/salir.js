var salir = document.getElementById('salir-p');
salir.addEventListener('click',function(e){
	console.log('hi');
	fetch('JS/PHP/salir.php')
	.then(res => res.json()).then(data => {
		console.log(data);
		if(data==='adios'){
			location.href ='login.html';
		}
	})
})
