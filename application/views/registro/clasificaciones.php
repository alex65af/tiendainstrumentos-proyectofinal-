<div style="margin: 0 10% 0 10%;">
<h1 class="text-white">Clasificacion</h1>
	<form method="post" action="/tiendainstrumentos/clasificacion/eliminar">
	<table class="table bg-dark text-white">
		<thead>
			<tr>
				<th>Familia</th>
				<th>Nombre</th>
				<th>Foto</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($clasificacion as $item) { ?>
					<tr>
						<td><?php echo $item->idfamilia; ?></td>
						<td><?php echo $item->nombre; ?></td>
						<td><img src="imagen/<?php echo $item->foto;?>"  width="150"></td>
						<td>
							<input type="button" class="btn btn-success" data-toggle="modal" data-target=".registro" value="Editar" onclick="Editar(<?php echo $item->idclasificacion?>,<?php echo $item->idfamilia;?>,'<?php echo $item->nombre;?>')">
						</td>
						<td>
							<form id="form<?php echo $item->idclasificacion;?>" method="post" action="/tiendainstrumentos/clasificacion/eliminar">
								<input type="hidden" name="idclasificacion" value="<?php echo $item->idclasificacion;?>"/>
								<input type="submit" onclick="Eliminar(<?php echo $item->idclasificacion?>)" class="btn btn-danger" value="Eliminar"/>
							</form>
						</td>
					</tr>
				<?php } ?>
		</tbody>
	</table>
	</form>
	
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".registro" onclick="Nuevo()">Insertar Producto</button>

	<!--Modal de Registro de clasificacion-->
	<div class="modal fade registro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
	    	<div class="modal-content">
	     		<div class="modal-content jumbotron">
	      			<form method="post" action="/tiendainstrumentos/clasificacion/insertar" enctype="multipart/form-data">
					  	<div class="form-row">
						    <div class="form-group col-md-6" >
						      	<label>Nombre</label>
						      	<input type="hidden" id="idclasificacion" name="idclasificacion"/>
				    			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
						    </div>
						     <div class="form-group col-md-6" >
						      	<label>Familia</label>
				    			<select class="form-control" id="idfamilia" name="idfamilia">
									<?php foreach ($familia as $item) { ?>
									<option value="<?php echo $item->idfamilia?>"><?php echo $item->nombre?></option>
									<?php } ?>
								</select>
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
					</form>
	    		</div>
	  		</div>
		</div>
	</div>	
	
	

	<script>
		//Funciones de Producto
		function Editar(idclasificacion,nombre,idfamilia,categoria,foto){
			document.getElementById('idclasificacion').value=idclasificacion;
			document.getElementById('idfamilia').value=idfamilia;
			document.getElementById('nombre').value=nombre;
			document.getElementById('foto').value=foto;
		}

		function Nuevo(){
			document.getElementById('idclasificacion').value=0;
			document.getElementById('idfamilia').value=0;
			document.getElementById('nombre').value='';
			document.getElementById('foto').value='';	
		}

		function Eliminar(id){
			console.log(id);
			if (confirm("Esta seguro que desea eliminar?")) {
				document.getElementById('form'+id).submit();	
			}
		}

	</script>