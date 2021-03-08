
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-5 mx-5">


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
                <h3 class="card-title">Lista de tipo de movimientos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body" id="h1">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Código</th>
                    <th>Tipo de movimiento</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php foreach(parent::find_tipomovimientos() as $tipomovimiento):?>
                 <tr>
                    <td><?=$tipomovimiento->Idmovi?></td>
                    <td><?=$tipomovimiento->TipoMoviDescripcion?></td>
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
                    <th>Tipo de movimiento</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php foreach(parent::find_tipomovimientos() as $tipomovimiento):?>
                 <tr>
                    <td><?=$tipomovimiento->Idmovi?></td>
                    <td><?=$tipomovimiento->TipoMoviDescripcion?></td>
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
