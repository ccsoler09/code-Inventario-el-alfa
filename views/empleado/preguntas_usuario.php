
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-5 mx-5">

      <div class="row">
          <div class="col-6">
              <a class="btn btn-dark" href="?controller=empleado&method=seguridades">Regresar</a>
          </div>
      </div>
<!--begin-->

<div class="my-5">
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de preguntas y respuestas de usuarios</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>Cargo</th>
                    <th>Estado</th>
                    <th>Pregunta</th>
                    <th>Respuesta</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php foreach(parent::preguntas_seguridades() as $data):?>
                 <tr>
                    <td><?=$data->nombre?></td>
                    <td><?=$data->email?></td>
                    <td><?=$data->CarDescripcion?></td>
                    <td><?=$data->nombre_estado?></td>
                    <td><?=$data->pregunta?></td>                    
                    <td><?=$data->respuesta?></td>
                  </tr>
                 <?php endforeach; ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
</div>

<!--end-->
      </div>
    </div>
  </div>
  </div>
  <!-- /.content-wrapper -->


