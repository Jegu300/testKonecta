<section>
    <div class="row mt-3 ms-1">
      <div class="col-10">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Productos</li>
          </ol>
        </nav>
      </div>
      <div class="col-2 mb-2">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar"><b>+</b></button>
      </div>
    </div>
</section>
<section> 
  <?php if (isset($validation)){ ?>
    <div class="alert alert-danger">     
      <?php  echo $validation->listErrors(); ?>
    </div>
  <?php } ?>
  <div class="table-responsive">
      <table id="datatablesSimple"  class="display table table-light">
        <thead class="table-Light"las>
           <tr>
              <th scope="col">#</th>
              <th scope="col">Ref.</th>
              <th scope="col">Nombre Producto</th>
              <th scope="col">Precio</th>
              <th scope="col">Peso</th>
              <th scope="col">Categoria</th>
              <th scope="col">Stock</th>
              <th ></th>
           </tr>
        </thead>
        <tbody>
          <?php foreach ($listarProductos as $item) {?>
            <tr>
              <td> <?php echo $item['id']; ?> </td>
              <td> <?php echo $item['referencia']; ?> </td>
              <td> <?php echo $item['nombreProducto']; ?> </td>
              <td> <?php echo $item['precio']; ?> </td>
              <td> <?php echo $item['peso']; ?> </td>
              <td> <?php echo $item['categoria']; ?> </td>
              <td> <?php echo $item['stock']; ?> </td>
              <td>
                <a type="button"  class="btn btn-warning btn-sm" href="<?php echo base_url()?>/editar-producto/<?php echo $item['id']; ?>">
                  <img src="<?php echo base_url() ?>/icons/edit-alt-solid-24.png" > 
                </a>
               
                <a type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#eliminarModal" data-bs-id="<?php echo $item['id']; ?>">
                  <img src="<?php echo base_url() ?>/icons/trash-regular-24.png" >
                </a>

              </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
  </section>
</div> 

<!-- Modal Agregar-->
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Agregar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <form method="POST" action="<?php echo base_url(); ?>/registrar-producto" >
        <div class="modal-body">
          <div  class="row mb-2">
              <div class="col-12 col-sm-12">
                  <div class="input-group mb-3">
                      <span class="input-group-text">Referencia</span>
                      <input type="text" class="form-control" id="referencia" name="referencia" autofocus required />
                  </div>
              </div>

              <div class="col-12 col-sm-12">
                  <div class="input-group mb-3">
                      <span class="input-group-text">Nombre</span>
                      <input type="text" class="form-control" id="nombre" name="nombre"   required />
                  </div>
              </div>

              <div class="col-12 col-sm-12">
                  <div class="input-group mb-3">
                      <span class="input-group-text">Precio</span>
                      <input type="number" class="form-control" id="precio" name="precio"   required />
                  </div>
              </div>

              <div class="col-12 col-sm-12">
                  <div class="input-group mb-3">
                      <span class="input-group-text">Peso</span>
                      <input type="number" class="form-control" id="peso" name="peso"   required />
                  </div>
              </div>

              <div class="col-12 col-sm-12">
                  <div class="input-group mb-3">
                      <span class="input-group-text">Categoria</span>
                      <input type="text" class="form-control" id="categoria" name="categoria"   required />
                  </div>
              </div>

              <div class="col-12 col-sm-12">
                  <div class="input-group mb-3">
                      <span class="input-group-text">Stock</span>
                      <input type="number" class="form-control" id="stock" name="stock"   required />
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Guardar</button>
        </div>
      </form> 
    </div>
  </div>
</div>
<!-- /Modal Agregar-->


<!-- Modal Eliminar-->
        <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h5>¿Desea eliminar registro?</h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>

                   <form id="fomrEliminar" data-action="<?php echo base_url()?>/eliminar-producto/" action="" method="GET">
                     <button type="submit" class="btn btn-primary">Aceptar</button>
                   </form>  
                </div>
              </div>
           </div>
        </div>
        <!-- /Modal Eliminar-->

<script type="text/javascript">
  
var eliminarModal = document.getElementById('eliminarModal')
eliminarModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var id = button.getAttribute('data-bs-id')

    var formEliminar = eliminarModal.querySelector('#fomrEliminar')
    var action = formEliminar.getAttribute("data-action")

    formEliminar.setAttribute("action", action + id )
})


</script>