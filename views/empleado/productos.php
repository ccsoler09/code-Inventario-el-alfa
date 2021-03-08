
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-5 mx-5">

      <div class="row">
          <div class="col-6">
              <a class="btn text-dark d-flex justify-content-start mx-2" href="?controller=empleado&method=agregar_productos"><i class="material-icons mx-3">person_add_alt_1</i><b>Agregar producto nuevo</b></a>
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
                <h3 class="card-title">Lista de productos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="h1">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Código</th>
                    <th>Categoría</th>
                    <th>Nombre de producto</th>
                    <th>Precio para venta</th>
                    <th>Estado</th>
                    <th>Proveedor</th>
                    <th>Editar</th>
                    <th>Cambiar estado</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php foreach(parent::productos() as $producto):?>
                 <tr>
                    <td><?=$producto->idprod?></td>
                    <td><?=$producto->NombCate?></td>
                    <td><?=$producto->Nombproduc?></td>
                    <td><?=$producto->PrecVentProduc?></td>
                    <td><?=$producto->Estado?></td>
                    <td><?=$producto->ProveNombres?></td>
                    <td><a href="?controller=empleado&method=update_productos&idprod=<?=$producto->idprod?>"><i class="material-icons text-dark">edit</i></a></td>
                    <td><a href="?controller=empleado&method=state_productos&idprod=<?=$producto->idprod?>"><i class="material-icons text-dark">refresh</i></a></td>
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
                    <th>Código</th>
                    <th>Categoría</th>
                    <th>Nombre de producto</th>
                    <th>Precio de compra</th>
                    <th>Iva</th>
                    <th>Precio para venta</th>
                    <th>Color</th>
                    <th>Estado</th>
                    <th>Material</th>
                    <th>Talla</th>
                    <th>Descripcion</th>
                    <th>Proveedor</th>
                    <th>Editar</th>
                    <th>Cambiar estado</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php foreach(parent::productos() as $producto):?>
                 <tr>
                    <td><?=$producto->idprod?></td>
                    <td><?=$producto->NombCate?></td>
                    <td><?=$producto->Nombproduc?></td>
                    <td><?=$producto->PrecCompproduc?></td>
                    <td><?=$producto->Iva?></td>
                    <td><?=$producto->PrecVentProduc?></td>
                    <td><?=$producto->Color?></td>
                    <td><?=$producto->Estado?></td>
                    <td><?=$producto->Material?></td>
                    <td><?=$producto->Talla?></td>
                    <td><?=$producto->Descripcion?></td>
                    <td><?=$producto->ProveNombres?></td>
                    <td><a href="?controller=empleado&method=update_productos&idprod=<?=$producto->idprod?>"><i class="material-icons text-dark">edit</i></a></td>
                    <td><a href="?controller=empleado&method=state_productos&idprod=<?=$producto->idprod?>"><i class="material-icons text-dark">refresh</i></a></td>
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
