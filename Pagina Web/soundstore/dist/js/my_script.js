
let tbodyPersonas = document.getElementById("tbodyPersonas");
let listaPersonas = null;
let formularioCrearUsuario = document.getElementById("formularioCrearUsuario");

formularioCrearUsuario.addEventListener("submit",function(event){
	event.preventDefault();
	registarUsuario();

});

function base_url(texto){
	return "http://localhost/concurso/index.php/"+texto;
}

function registarUsuario(){
	let datos = new FormData ( formularioCrearUsuario );
	let configuracion = {
							method:"POST",
							headers:{"Accept":"application/json"},
							body: datos,
	                    };
	fetch(base_url('admin/Usuario/insertarUsuario'),configuracion)
    .then( resp =>resp.json())
	.then(data =>{
		console.log("Se recibe de la API insertar" );
		console.log( data );
		if(data.status && data.message=="OK##INSERT"){
			Swal.fire({
				title:'Usuario Creado',
				icon: 'success',
				text: 'Se ha creado con exito el usuario,puede ingresar al sitema con el numero de documento',
				confirmButtonText: 'Entendido',
				confirmButtonColor: "#00A100",
			});
			document.getElementById("campo_cedula").value="";	
			document.getElementById("campo_nombres").value="";	
			document.getElementById("campo_apellidos").value="";	
			document.getElementById("campo_telefono").value="";	
			document.getElementById("campo_direcion").value="";	
			document.getElementById("campo_email").value="";	
			document.getElementById("campo_tipo").value="";	
		}
		if(data.status == false && data.message=="ERROR##DUPLICADO"){
			Swal.fire({
				title:'ERROR DATOS DUPLICADOS',
				icon: 'error',
				text: 'Es posible que la cedula o el email, se encuntren registrados',
				confirmButtonText: 'Entendido',
				confirmButtonColor: "#A1000"
			});
		}
		if(data.status ==false && data.message=="ERROR##DATOS##VACIOS"){
			Swal.fire({
				title:'ERROR DATOS VACIOS',
				icon: 'error',
				text: 'Todos los datos del formulario son obligatorio',
				confirmButtonText: 'Entendido',
				confirmButtoColor: "#A1000"
			});

		}
	});

}

function cargarPersonas(){
	fetch( base_url("admin/Usuario/getListaUsuarios") )
	.then( res => res.json() )
	.then( data => {
		
		listaPersonas = data;
		tbodyPersonas.innerHTML = "";
		for (var i = 0; i < data.length; i++) {
			html_tr = `
						<tr>
				            <td>${ data[i].cedula }</td>
				            <td>${ data[i].nombres }</td>
				            <td>${ data[i].apellidos }</td>
				            <td>${ data[i].telefono }</td>
				            <td>${ data[i].direccion }</td>
				            <td>${ data[i].email }</td>
				            <td>
				            	<button class="btn btn-primary" onclick="abrirModalEditar(${i})" >
				            		Editar
				            	</button>
				            	<button class="btn btn-danger" onclick="confirmarEliminacion(${i})">
				            		Eliminar
				            	</button>
				            </td>
				        </tr>
					  `;
			tbodyPersonas.innerHTML += html_tr;
		}

	});
}

function abrirModalEditar(indice){
	console.log( "Abriendo modal para editar a:" );
	console.log( listaPersonas[indice] );
}

function confirmarEliminacion(indice){
	console.log( "Abriendo confirmacion para eliminar a:" );
	console.log( listaPersonas[indice] );
}


cargarPersonas();