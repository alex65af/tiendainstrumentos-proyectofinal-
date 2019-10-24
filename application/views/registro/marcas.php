<div style="margin: 0 20% 0 20%;">
<h1 class="text-white">Marcas</h1>
	<form method="post" action="/tiendainstrumentos/marca/eliminar">
	<table class="table bg-dark text-white">
		<thead>
			<tr>
				<th>Marca</th>
				<th>Nombre</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($marca as $item) { ?>
					<tr>
						<td><?php echo $item->idmarca; ?></td>
						<td><?php echo $item->nombre; ?></td>
						<td>
							<input type="button" class="btn btn-success" data-toggle="modal" data-target=".registro" value="Editar" onclick="Editar(<?php echo $item->idmarca;?>,'<?php echo $item->nombre;?>')">
						</td>
						<td>
							<form id="form<?php echo $item->idmarca;?>" method="post" action="/tiendainstrumentos/marca/eliminar">
								<input type="hidden" name="idmarca" value="<?php echo $item->idmarca;?>"/>
								<input type="submit" onclick="Eliminar(<?php echo $item->idmarca?>)" class="btn btn-danger" value="Eliminar"/>
							</form>
						</td>
					</tr>
				<?php } ?>
		</tbody>
	</table>
	</form>
	
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".registro" onclick="Nuevo()">Insertar Producto</button>

	<!--Modal de Registro de marca-->
	<div class="modal fade registro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
	    	<div class="modal-content">
	     		<div class="modal-content jumbotron">
	      			<form method="post" action="/tiendainstrumentos/marca/insertar" enctype="multipart/form-data">
					  	<div class="form-row">
						    <div class="form-group col-md-6" >
						      	<label>Nombre</label>
						      	<input type="hidden" id="idmarca" name="idmarca"/>
				    			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
						    </div>
					  	</div>
				  		<div class="modal-footer">
        					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        					<button type="submit" class="btn btn-primary">Guardar</button>
      					</div>
					</form>
	    		</div>
	  		</div>
		</div>
	</div>	
	
	

	<script>
		//Funciones de Producto
		function Editar(idmarca,nombre){
			document.getElementById('idmarca').value=idmarca;
			document.getElementById('nombre').value=nombre;
		}

		function Nuevo(){
			document.getElementById('idmarca').value=0;
			document.getElementById('nombre').value='';
		}

		function Eliminar(id){
			console.log(id);
			if (confirm("Esta seguro que desea eliminar?")) {
				document.getElementById('form'+id).submit();	
			}
		}

	</script>