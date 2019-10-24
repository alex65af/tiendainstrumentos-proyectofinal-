<div class="row">
          <?php foreach ($lista as $item) { ?>
            <form method="post" action="/tiendainstrumentos/vistas/index">
            <div class="card col border-warning" style="max-width: 25%; margin: 20px 20px 0px 20px;">
              <img src="/tiendainstrumentos/imagen/<?php echo $item->foto;?>"  max-width="50px" class="card-img-top">
                <div class="card-body">
                  <h2 align="center"><?php echo $item->nombre;?></h2>
                </div>
                  <input type="hidden" id="id" name="id" value="<?php echo $item->idclasificacion;?>">
                 <button class="btn btn-primary" type="submit">Ver mas</button>
                <div class="card-footer bg-trasnparent border-warning" align="center">Ver mas</div>
            </div>
            </form>
          <?php } ?>
        </div>  
</div>  
