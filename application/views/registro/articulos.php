<div style="margin: 0 10% 0 10%;">
<h1 class="text-white">Productos</h1>
	<form method="post" action="/tiendainstrumentos/articulo/eliminar">
	<table class="table bg-dark text-white">
		<thead>
			<tr>
				<th>Clasificacion</th>
				<th>Marca</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Descripcion</th>
				<th>Foto</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody id="filas">
			
		</tbody>
	</table>
	</form>
	
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".registro" onclick="Nuevo()">Insertar Producto</button>
	
	<!--Modal de Registro de articulo-->
	<div class="modal fade registro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
	    	<div class="modal-content">
	     		<form accept-charset="utf-8" method="POST" id="enviarimagenes" enctype="multipart/form-data" >
	     		<div class="modal-content jumbotron">
	      			<div class="form-row">
						    <div class="form-group col-md-6" >
						      	<label>Nombre</label>
						      	<input type="hidden" id="idarticulo" name="idarticulo"/>
				    			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
						    </div>
						    <div class="form-group col-md-6" >
						      	<label>Precio</label>
				    			<input  type="number" min="0.01" step="0.01" class="form-control" id="precio" name="precio" placeholder="Precio">
						    </div>
						     <div class="form-group col-md-6" >
						      	<label>Clasificacion</label>
				    			<select class="form-control" id="idclasificacion" name="idclasificacion">
									<?php foreach ($clasificacion as $item) { ?>
									<option value="<?php echo $item->idclasificacion?>"><?php echo $item->nombre?></option>
									<?php } ?>
								</select>
						    </div>
						     <div class="form-group col-md-6" >
						      	<label>Marca</label>
				    			<select class="form-control" id="idmarca" name="idmarca">
									<?php foreach ($marca as $item) { ?>
									<option value="<?php echo $item->idmarca?>"><?php echo $item->nombre?></option>
									<?php } ?>
								</select>
						    </div>
						     <div class="form-group col-md-6">
						      	<label>Descripcion</label>
				    			<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">
						    </div>
						    <div>
						    	<label>Foto</label>
						    	<input class="form-control" type="file" id="foto" name="foto">
						    </div>
					  	</div>
				  		<div class="modal-footer">
        					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        					<button type="submit" class="btn btn-primary">Guardar</button>
      					</div>
	    		</div>
	    	</form>
	  		</div>
		</div>
	</div>	
	
	<script>
		//Funciones de Producto
		window.onload = function(){
			listar();	
		}
		
		function listar(){
			console.log('sa');
			var datos=null;
			$.getJSON('/tiendainstrumentos/articulo/listar',null,function(datos){
				$datos=datos;
				var filas="";
				console.log(datos);
				for(var i = 0; i < datos.length; i++){
					var o = datos[i];
					filas+='<tr>'+
						'<td>'+o.idclasificacion+'</td>'+
						'<td>'+o.idmarca+'</td>'+
						'<td>'+o.nombre+'</td>'+
						'<td>'+o.precio+'</td>'+
						'<td>'+o.descripcion+'</td>'+
						'<td><img src="" width="150"></td>'+
						'<td><input type="button" class="btn btn-success" data-toggle="modal" data-target=".registro" value="Editar" onclick="Editar('+o.idarticulo+')"></td>'+
						'<td><input type="hidden" name="idarticulo" value="'+o.idarticulo+'"/>'+
								'<input onclick="Eliminar('+o.idarticulo+')" class="btn btn-danger" value="Eliminar"/></td></tr>'
				}
				$('#filas').html(filas);
				console.log('asd');
				});
			console.log(datos);	
		}

		function Editar(id){
			$.getJSON('/tiendainstrumentos/articulo/getxId',{idarticulo:id},function(o){
			$('#idarticulo').val(o.idarticulo);
			$('#idclasificacion').val(o.idclasificacion);
			$('#idmarca').val(o.idmarca);
			$('#nombre').val(o.nombre);
			$('#precio').val(o.precio);
			$('#descripcion').val(o.descripcion);
			$('#foto').val(o.foto);
		})
		}

		function Nuevo(){
			$('#idarticulo').val(0);
			$('#idclasificacion').value=0;
			$('#idmarca').value=0;
			$('#nombre').value='';
			$('#precio').value='';
			$('#descripcion').value='';
			//$('#foto').value='';	

		}

		
		$("#enviarimagenes").on("submit", function(e){
			e.preventDefault();
			var formData = new FormData(document.getElementById("enviarimagenes"));
			$.ajax({
				url: "/tiendainstrumentos/articulo/insertar",
				type: "POST",
				dataType: "HTML",
				data: formData,
				cache: false,
				contentType: false,
				processData: false
			}).done(function(echo){
				$("#mensaje").html(echo);
			});
		});
/*		var obj={
			idarticulo:$("#idarticulo").val(),
			idclasificacion:$("#idclasificacion").val(),
			idmarca:$("#idmarca").val(),
			nombre:$("#nombre").val(),
			precio:$("#precio").val(),
			descripcion:$("#descripcion").val(),
			foto:$("#foto").val()
			};
		$.post('/tiendainstrumentos/articulo/insertar',obj,function(){
			$('#exampleModal').modal("hide");
			listar();
		});
	*/


	function Eliminar(id){
		if(confirm("Esta seguro?")){
			$.post('/tiendainstrumentos/articulo/eliminar',{idarticulo:id},function(){
				listar();
			});	
		}
	}
	</script>