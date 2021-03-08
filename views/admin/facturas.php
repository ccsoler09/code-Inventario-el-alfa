
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-5 mx-5">

      <div class="row">
          <div class="col-6">
              <a class="btn text-dark d-flex justify-content-start mx-2" href="?controller=admin&method=crear_factura"><i class="material-icons mx-3">person_add_alt_1</i><b>Agregar factura nueva</b></a>
          </div>
      </div>

  <div class="row">
    <div class="col-6 my-4">  
    <button class="btn btn-dark" id="bton1">Tabla con acciones</button>   
    </div> 
    <div class="col-6 my-4">  
    <button class="btn btn-dark" id="bton2">Tabla para lector</button>  
    </div>
  </div>
<!--begin-->

<div class="my-5">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de facturas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="h1">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Código de factura</th>
                    <th>Asesor</th>
                    <th>Cliente</th>
                    <th>Iva</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                    <th>Ver</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php foreach(parent::total_facturas() as $facturas):?>
                 <tr>
                    <td><?=$facturas->fecha_factura?></td>
                    <td><?=$facturas->codigo_factura?></td>
                    <td><?=$facturas->nombre?></td>
                    <td><?=$facturas->PersoNombres?></td>
                    <td><?=$facturas->iva?>%</td>
                    <td>$<?=$facturas->subtotal?></td>
                    <td>$<?=$facturas->total?></td>
                    <td><a class="btn btn-white" target="_blank" href="?controller=admin&method=fpdf&id_factura=<?=$facturas->id_factura?>"><i class="material-icons">get_app</i></a></td>
                  </tr>
                 <?php endforeach; ?>
                  </tfoot>
                </table>

              
              <!-- /.card-body -->
            </div>

            <div class="card-body table-responsive p-0" id="h2">
                <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Código de factura</th>
                    <th>Asesor</th>
                    <th>Cliente</th>
                    <th>Iva</th>
                    <th>Subtotal</th>
                    <th>Total</th>
                    <th>Ver</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php foreach(parent::total_facturas() as $facturas):?>
                 <tr>
                    <td><?=$facturas->fecha_factura?></td>
                    <td><?=$facturas->codigo_factura?></td>
                    <td><?=$facturas->nombre?></td>
                    <td><?=$facturas->PersoNombres?></td>
                    <td><?=$facturas->iva?>%</td>
                    <td>$<?=$facturas->subtotal?></td>
                    <td>$<?=$facturas->total?></td>
                    <td><a class="btn btn-white" target="_blank" href="?controller=admin&method=fpdf&id_factura=<?=$facturas->id_factura?>"><i class="material-icons">get_app</i></a></td>
                  </tr>
                 <?php endforeach; ?>
                    </tbody>
                </table>
              </div>
</div>

<!--end-->
      </div>
    </div>
  </div>
  </div>
  <!-- /.content-wrapper -->

<script>
var bton1 = document.getElementById('bton1');
var bton2 = document.getElementById('bton2');
var h1 = document.getElementById('h1');
var h2 = document.getElementById('h2');

//función inicial
h2.style.display = "none";
bton1.setAttribute('disabled', '');

bton2.addEventListener('click', function(e){
  h1.style.display = "none";
  bton2.setAttribute('disabled', '');
  h2.style.display = "block";
  bton1.removeAttribute('disabled', '');
});



bton1.addEventListener('click', function(e){
  h2.style.display = "none";
  bton1.setAttribute('disabled', '');
  h1.style.display = "block";
  bton2.removeAttribute('disabled', '');
});
</script>
