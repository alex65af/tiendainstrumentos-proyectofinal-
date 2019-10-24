<h1>Productos</h1>
	<form method="post" action="/proyecto/producto/eliminar">
	<table class="table bg-dark text-white">
		<thead>
			<tr>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Precio</th>
				<th>Categoria</th>
				<th>Descripcion</th>
				<th>Foto</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($lista as $item) { ?>
					<tr>
						<td><?php echo $item->codigo; ?></td>
						<td><?php echo $item->nombre; ?></td>
						<td><?php echo $item->precio; ?> Bs.</td>
						<td><?php echo $item->categoria;?></td>
						<td><?php echo $item->descripcion; ?></td>
						<td><img src="imagen/<?php echo $item->foto;?>"  width="150"></td>
						<td>
							<input type="button" class="btn btn-success" data-toggle="modal" data-target=".registro" value="Editar" onclick="Editar(<?php echo $item->idproducto?>,'<?php echo $item->codigo;?>','<?php echo $item->nombre;?>',<?php echo $item->precio;?>,'<?php echo $item->idcategoria;?>','<?php echo $item->descripcion;?>')">
						</td>
						<td>
							<form id="form<?php echo $item->idproducto;?>" method="post" action="/proyecto/producto/eliminar">
								<input type="hidden" name="idproducto" value="<?php echo $item->idproducto;?>"/>
								<input type="submit" onclick="Eliminar(<?php echo $item->idproducto?>)" class="btn btn-danger" value="Eliminar"/>
							</form>
						</td>
					</tr>
				<?php } ?>
		</tbody>
	</table>
	</form>
	
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".registro" onclick="Nuevo()">Insertar Producto</button>
	
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".categoria" onclick="NuevoC()">Insertar Categoria</button>

	<!--Modal de Registro de Productos-->
	<div class="modal fade registro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
	    	<div class="modal-content">
	     		<div class="modal-content jumbotron">
	      			<form method="post" action="/proyecto/producto/insertar" enctype="multipart/form-data">
					  	<div class="form-row">
						    <div class="form-group col-md-6" >
						      	<label>Codigo</label>
						      	<input type="hidden" id="idproducto" name="idproducto"/>
				    			<input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo">
						    </div>
						    <div class="form-group col-md-6" >
						      	<label>Nombre</label>
				    			<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
						    </div>
						    <div class="form-group col-md-6" >
						      	<label>Precio</label>
				    			<input  type="number" min="0.01" step="0.01" class="form-control" id="precio" name="precio" placeholder="Precio">
						    </div>
						     <div class="form-group col-md-6" >
						      	<label>Categoria</label>
				    			<select class="form-control" id="categoria" name="categoria">
									<?php foreach ($listacat as $item) { ?>
									<option value="<?php echo $item->idcategoria?>"><?php echo $item->nombre?></option>
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
					</form>
	    		</div>
	  		</div>
		</div>
	</div>	
	
	<!--Modal de Registro de Categorias-->
	<div class="modal fade categoria" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm">
	    	<div class="modal-content">
	     		<div class="modal-content jumbotron">
	      			<form method="post" action="/proyecto/categoria/insertar">
					  	<div class="form-row">
						    <div class="form-group col-md-6" >
						      	<label>Nombre</label>
						      	<input type="hidden" id="idcategoriaC" name="idcategoriaC"/>
				    			<input type="text" class="form-control" id="nombreC" name="nombreC" placeholder="Nombre">
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
		function Editar(idproducto,codigo,nombre,precio,categoria,descripcion){
			document.getElementById('idproducto').value=idproducto;
			document.getElementById('nombre').value=nombre;
			document.getElementById('codigo').value=codigo;
			document.getElementById('precio').value=precio;
			document.getElementById('categoria').value=categoria;
			document.getElementById('descripcion').value=descripcion;
		}

		function Nuevo(){
			document.getElementById('idproducto').value=0;
			document.getElementById('nombre').value='';
			document.getElementById('codigo').value='';
			document.getElementById('precio').value='';
			document.getElementById('categoria').value='';
			document.getElementById('descripcion').value='';	
		}

		function Eliminar(id){
			console.log(id);
			if (confirm("Esta seguro que desea eliminar?")) {
				document.getElementById('form'+id).submit();	
			}
		}

		//Funcion de Categoria
		function NuevoC(){
			document.getElementById('idcategoriaC').value=0;
			document.getElementById('nombreC').value='';	
		}
	</script>