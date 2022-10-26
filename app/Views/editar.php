<section>
    <div class="row mt-3 ms-1">
      <div class="col-10">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Editar</li>
          </ol>
        </nav>
      </div>
    </div>
</section>

<div class="card offset-2" style="width: 48rem;">
  <div class="card-body">
    
    <form method="POST" action="<?php echo base_url(); ?>/editar-producto" >
      <div class="modal-body">
        <div  class="row mb-2">
            <div class="col-12 col-sm-12">
                <div class="input-group mb-3">
                    <span class="input-group-text">Referencia</span>
                    <input type="text" class="form-control" id="referencia" name="referencia" value="<?php echo $datosEditar['referencia'] ?>" autofocus required />
                    <input type="hidden" class="form-control" name="id_act" value="<?php echo $datosEditar['id'] ?>" required />
                </div>
            </div>

            <div class="col-12 col-sm-12">
                <div class="input-group mb-3">
                    <span class="input-group-text">Nombre</span>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $datosEditar['nombreProducto'] ?>"  required />
                </div>
            </div>

            <div class="col-12 col-sm-12">
                <div class="input-group mb-3">
                    <span class="input-group-text">Precio</span>
                    <input type="number" class="form-control" id="precio" name="precio" value="<?php echo $datosEditar['precio'] ?>"  required />
                </div>
            </div>

            <div class="col-12 col-sm-12">
                <div class="input-group mb-3">
                    <span class="input-group-text">Peso</span>
                    <input type="number" class="form-control" id="peso" name="peso" value="<?php echo $datosEditar['peso'] ?>"  required />
                </div>
            </div>

            <div class="col-12 col-sm-12">
                <div class="input-group mb-3">
                    <span class="input-group-text">Categoria</span>
                    <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $datosEditar['categoria'] ?>"  required />
                </div>
            </div>

            <div class="col-12 col-sm-12">
                <div class="input-group mb-3">
                    <span class="input-group-text">Stock</span>
                    <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $datosEditar['stock'] ?>"  required />
                </div>
            </div>
        </div>
      </div>
      <hr>
      <div class="text-center">
        <button type="button" class="btn btn-info">Regresar</button>
        <button type="submit" class="btn btn-warning">Editar</button>
      </div>
    
    </form>

  </div>
</div>
