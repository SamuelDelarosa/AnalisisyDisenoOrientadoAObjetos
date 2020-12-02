var formulario_L = document.getElementById('buscar-libro');
var formulario_T = document.getElementById('buscar-TT');
var formulario_C = document.getElementById('buscar-CD');
var respuesta_l = document.getElementById('lib');
var respuesta_t = document.getElementById('tt');
var respuesta_c = document.getElementById('cd');
formulario_L.addEventListener('submit',function(e){
				e.preventDefault();
                var datos= new FormData(formulario_L);  
                console.log(datos.get('titulo-libro'));
                fetch('JS/PHP/buscar-libro.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                	console.log(data);
                        llenado(data);
                    function llenado(data){
                    
                    respuesta_l.innerHTML = ''
                    for (let valor of data){
                        console.log("hola")
                        //string +='<tr><td>January</td><td>$100</td></tr>';
                       // console.log(string);
                         //tabla.innerHTML+="hola";
                         
                             respuesta_l.innerHTML +='ID:'+valor.idLibro+'<br>Libro:'+valor.nombre+'<br>';
                         }}

                })
})
formulario_T.addEventListener('submit',function(e){
				e.preventDefault();
                var datos= new FormData(formulario_T);  
                console.log(datos.get('titulo-tt'));
                fetch('JS/PHP/buscar-tt.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);

                    llenado(data);
                    
                    function llenado(data){
                    
                    respuesta_t.innerHTML = ''
                    for (let valor of data){
                        console.log("hola")
                        //string +='<tr><td>January</td><td>$100</td></tr>';
                       // console.log(string);
                         //tabla.innerHTML+="hola";
                         
                             respuesta_t.innerHTML +='ID:'+valor.idTT+'<br>Libro:'+valor.titulo+'<br>';
                         }}
                })
})
formulario_C.addEventListener('submit',function(e){
				e.preventDefault();
                var datos= new FormData(formulario_C);  
                console.log(datos.get('titulo-cd'));
                fetch('JS/PHP/buscar-cd.php',{
                    method: 'POST',
                    body: datos
                })
                .then(res => res.json())
                .then(data => {
                    console.log(data);
                    llenado(data);
                    function llenado(data){
                    
                    respuesta_c.innerHTML = ''
                    for (let valor of data){
                        console.log("hola")
                        
                         
                             respuesta_c.innerHTML +='ID:'+valor.idCD+'<br>Libro:'+valor.Nombre+'<br>';
                         }}
                })
})