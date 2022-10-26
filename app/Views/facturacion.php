<section>
    <div class="row mt-3 ms-1">
      <div class="col-10">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Facturación</li>
          </ol>
        </nav>
      </div>
    </div>
</section>

<div class="card offset-2" style="width: 60rem;">
  <div class="card-body">


<?php 
$id_ventas= uniqid();
?>
<div id="layoutSidenav_content">
    <main>
        <div class="text-center mt-3">
            <h3>
                <b>CAJA</b>
            </h3>
        </div>
        <?php if (isset($validation)){ ?>
                <div class="alert alert-danger">     
                <?php  echo $validation->listErrors(); ?>
                </div>
            <?php } ?>
        <br>
        <div class="container-fluid px-4">
            <form  id="form_venta" name="form_venta" autocomplete="off" method="POST" action="<?php echo base_url(); ?>/ventas/insertar" >
                <label for="codigo" id="resultado_error" style="color: red; "></label>
               
                <div  class="row mb-2"> 
                    <div class="col-12 col-sm-5">
                        <div class="input-group mb-3">
                            <input type="hidden" name="id_producto" id="id_producto"> 

                            <span class="input-group-text">Codigo</span>
                            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Escribe el código y enter" onkeyup="agregarProducto(event, this.value, 1, '<?php echo $id_ventas ?>')" autofocus />
                        </div>
                    </div>

                    
                    <div class="col-12 col-sm-5 offset-1" >
                        <label style="font-weight: bold; font-size: 30px; text-align: center;">Total $ </label>
                        <input type="text" name="total" id="total" size="7" readonly="true" value="0.00" style="font-weight:bold; font-size:30px; text-align:center; border:#E2EBED; background:#ffffff">
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <table id="tablaProductos" class="table table-hover table-striped tablaProductos" width="100%">
                        <thead class="table-dark">
                            <th>#</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Acciones</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <button type="button" id="completa_venta" class="btn btn-outline-success mt-3"><b>Comprar</b></button>
                </div>
            </form> 
        </div>
    </main>

    <div id="modalito" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Caja</h5>
                    </button>
                </div>
                <div class="modal-body">
                    <h6>Debe agregar un producto para completar la venta.</h6>
                </div>  
            </div>
        </div>
    </div>
  </div>
</div>


<script type="text/javascript">


    function agregarProducto(e, id_producto, cantidad) {

        var enterkey = 13;
        if (codigo !='') { 
            if (e.which == enterkey) {
                if(id_producto != null && id_producto != 0 && cantidad > 0){
                    $.ajax({
                        url: '<?php echo base_url(); ?>/TemporalVentas/insertar/' + id_producto + '/' + cantidad + '/',
                        success: function(response) {
                            if (response == 0) {

                            } else {
                                var resultado = JSON.parse(response);
                                if(resultado.error ==''){
                                    $("#resultado_error").html(resultado.error);
                                    $('#tablaProductos tbody').empty();
                                    $("#tablaProductos tbody").append(resultado.datos);
                                    $("#total").val(resultado.total);
                                    $("#id_producto").val('');
                                    $("#codigo").val('');
                                    $("#nombre").val('');
                                    $("#cantidad").val('');
                                    $("#precio_venta").val('');
                                    $("#subtotal").val('');
                                    $("#codigo").focus();
                                } else {
                                    $("#resultado_error").html(resultado.error);
                                }
                            }
                        }
                    });
                } else {
                    muestraModal('Aviso', 'Debe completar los datos del producto.');
                }
            }
        }
    }



    $(document).ready(function(){
        $("#codigo").autocomplete({
            source: '<?php echo base_url()?>',
            minLength: 1,
            focus: function() {
                return false;
            },
            select: function( event, ui ) {
                event.preventDefault();
                $("#codigo").val(ui.item.value);
                setTimeout(
                    function() {
                    e = jQuery.Event("keypress");   
                    e.which = 13;
                    agregarProducto(e, ui.item.id, 1, '<?php echo $id_ventas; ?>');
                    }
                )    
            }
        });
    });


</script> 
