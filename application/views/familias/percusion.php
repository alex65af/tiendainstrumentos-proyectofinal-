<div class="row">
          <?php foreach ($lista as $item) { ?>
            <div class="card col border-warning" style="max-width: 25%; margin: 20px 20px 0px 20px;">
              <img src="/tiendainstrumentos/imagen/<?php echo $item->foto;?>"  max-width="50px" class="card-img-top">
                <div class="card-body">
                  <h2 align="center"> <?php echo $item->nombre;?></h2>
                </div>
                <div class="card-footer bg-trasnparent border-warning" align="center">Ver mas</div>
            </div>
          <?php } ?>
        </div>  
        </div>  
