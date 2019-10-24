<div style="margin: 0 10% 0 10%;">
<h1 class="text-white">Productos</h1>
	<div class="row">
	<?php foreach ($lista as $item) { ?>
		<div class="card col-md-4 bg-dark text-white" style="margin: 10px 10px 0 0;">
		  <img src="data:image/jpeg;base64,<?php echo base64_encode($item->foto); ?>" class="card-img" style="width: 100%; height: 100%;">
		  <div class="card-img-overlay" style="background-color: rgba(0, 0, 0, .5);">
		    <h5 class="card-title"><?php echo $item->nombre?></h5>
			    <p class="card-text"><?php echo $item->descripcion?></p>
			    <p class="card-text"><?php echo $item->precio?><small class="text-muted"></small></p>
		  </div>
		</div>
	<?php } ?>
	</div>
</div>
